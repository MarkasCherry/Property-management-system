<div>
    <form method="POST" action="{{ route('media.create', [$modelId, $model]) }}" class="dropzone"
          id="dz" enctype="multipart/form-data">
        @csrf
        <div class="fallback">
            <input name="file" type="file"/>
        </div>
    </form>
</div>
