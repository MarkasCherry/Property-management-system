media = function (model, modelId) {
    Dropzone.options.dz = {
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        addRemoveLinks: true,
        init: function () {
            // Get images
            var myDropzone = this;

            $.ajax({
                url: '/media/' + modelId + '/' + model,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $.each(data, function (key, value) {
                        var file = {name: value.name, size: value.size, id: value.id};
                        myDropzone.options.addedfile.call(myDropzone, file);
                        myDropzone.options.thumbnail.call(myDropzone, file, value.path);
                        myDropzone.emit("complete", file);
                    });
                }
            });
        },
        removedfile: function (file) {
            if (this.options.dictRemoveFile) {
                return Dropzone.confirm("Are You Sure to " + this.options.dictRemoveFile, function () {
                    if (file.previewElement.id != "") {
                        var name = file.previewElement.id;
                    } else {
                        var name = file.name;
                    }
                    //console.log(name);
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'POST',
                        url: '/media/delete',
                        data: {fileId: file.id},
                        error: function (e) {
                            console.log(e);
                        }
                    });
                    var fileRef;
                    return (fileRef = file.previewElement) != null ?
                        fileRef.parentNode.removeChild(file.previewElement) : void 0;
                });
            }
        }
    };
}
