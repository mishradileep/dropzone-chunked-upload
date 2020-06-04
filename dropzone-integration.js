Dropzone.autoDiscover = false;
var myDropzone = new Dropzone("#demoUpload", {
    url: "chunk-upload.php", // Check that our form has an action attr and if not, set one here
    maxFilesize: 1024 * 3, // megabytes
    chunking: true,
    parallelUploads: 1,
    parallelChunkUploads: true,
    retryChunks: true,
    retryChunksLimit: 10,
    forceChunking: true,
    chunkSize: 1000 * 1000 * 10,
    clickable: true,
    //autoProcessQueue: false,
    chunksUploaded: function(file, done) {
      // All chunks have been uploaded. Perform any other actions
      let currentFile = file;
  
      // This calls server-side code to merge all chunks for the currentFile
      $.ajax({
          url: "chunk-concat.php?dzorizName=" + currentFile.upload.filename + "&dzuuid=" + currentFile.upload.uuid + "&dztotalchunkcount=" + currentFile.upload.totalChunkCount + "&fileName=" + currentFile.name.substr( (currentFile.name.lastIndexOf('.') +1) ),
          success: function (data) {
              done();
          },
          error: function (msg) {
              currentFile.accepted = false;
              myDropzone._errorProcessing([currentFile], msg.responseText);
          }
       });
    },
  
  });