<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaController extends Controller
{
    private function getModel($modelName, $modelId) {
        $modelName = str_replace('_', '\\', $modelName);
        return $modelName::find($modelId);
    }

    public function index($modelId, $modelName): JsonResponse
    {
        $model = $this->getModel($modelName, $modelId);

        $data = [];
        foreach ($model->getMedia() as $media) {
            $data[] = [
                'name' => $media->file_name,
                'size' => $media->size,
                'path' => $media->getUrl(),
                'id' => $media->id
            ];
        }

        return response()->json($data);
    }

    public function create($modelId, $modelName)
    {
        $model = $this->getModel($modelName, $modelId);

        $model->addMediaFromRequest('file')->toMediaCollection();
    }

    public function destroy(Request $request): JsonResponse
    {
        $fileId =  $request->get('fileId');

        Media::find($fileId)->delete();

        return response()->json([
            'success' => 'The file has been successfully deleted'
        ]);
    }
}
