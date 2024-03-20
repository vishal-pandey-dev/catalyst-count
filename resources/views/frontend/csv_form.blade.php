@extends('frontend.layouts.app')

@section('content')
<style>
    #progressBarContainer {
        width: 100%;
        height: 20px;
        background-color: #f0f0f0;
        margin-top: 10px;
    }
    
    #progressBar {
        height: 100%;
        background-color: #4caf50;
        width: 0;
    }

</style>



<form id="uploadForm" action="{{ route('csv.import') }}" method="POST" enctype="multipart/form-data" style="padding: 10rem;">
    @csrf
      <div class="form-group">
        <label for="exampleInputEmail1">Add Your File here</label>
        <input type="file" class="form-control" name="csv_file"  id="fileInput">
        <small id="emailHelp" class="form-text text-muted">Upload File Here</small>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
      <div id="progressBarContainer">
            <div id="progressBar"></div>
        </div>
</form>


<script>
// document.addEventListener('DOMContentLoaded', function() {
//     let uploadForm = document.getElementById('uploadForm');
//     if (uploadForm) {
//         uploadForm.addEventListener('submit', function(e) {
//             e.preventDefault();

//             let fileInput = document.getElementById('fileInput');
//             console.log(fileInput);
//             if (fileInput && fileInput.files.length > 0) {
//                 let formData = new FormData();
//                 formData.append('file', fileInput.files[0]);

//                 let xhr = new XMLHttpRequest();
//                 xhr.open('POST', this.getAttribute('action'), true);

//                 xhr.upload.onprogress = function(e) {
//                     let percent = (e.loaded / e.total) * 100;
//                     document.getElementById('progressBar').style.width = percent + '%';
//                 };

//                 xhr.onreadystatechange = function() {
//                     if (xhr.readyState === 4 && xhr.status === 200) {
//                         // Upload complete
//                         console.log('Upload complete');
//                     }
//                 };

//                 xhr.send(formData);
//             } else {
//                 console.error('No file selected');
//             }
//         });
//     } else {
//         console.error('Upload form not found');
//     }
// });

</script>


@endsection