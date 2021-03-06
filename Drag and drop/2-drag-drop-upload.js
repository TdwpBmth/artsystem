var upcontrol = {
    queue : null, // upload queue
    now : 0, // current file being uploaded
    start : function (files) {
    // upcontrol.start() : start upload queue
  
      // WILL ONLY START IF NO EXISTING UPLOAD QUEUE
      if (upcontrol.queue==null) {
        // VISUAL - DISABLE UPLOAD UNTIL DONE
        upcontrol.queue = files;
        document.getElementById('uploader').classList.add('disabled');
  
        // PROCESS UPLOAD - ONE BY ONE
        upcontrol.run();
      }
    },
    run : function () {
    // upcontrol.run() : proceed upload file
  
      var xhr = new XMLHttpRequest(),
          data = new FormData();
      data.append('file-upload', upcontrol.queue[upcontrol.now]);
      xhr.open('POST', 'simple-upload.php', true);
      xhr.onload = function (e) {
        // SHOW UPLOAD STATUS
        var fstat = document.createElement('div'),
            txt = upcontrol.queue[upcontrol.now].name + " - ";
        if (xhr.readyState === 4) {
          if (xhr.status === 200) {
            // SERVER RESPONSE
            txt += xhr.responseText;
          } else {
            // ERROR
            txt += xhr.statusText;
          }
        }
        fstat.innerHTML = txt;
        document.getElementById('upstat').appendChild(fstat);
  
        // UPLOAD NEXT FILE
        upcontrol.now++;
        if (upcontrol.now < upcontrol.queue.length) {
          upcontrol.run();
        }
        // ALL DONE
        else {
          upcontrol.now = 0;
          upcontrol.queue = null;
          document.getElementById('uploader').classList.remove('disabled');
        }
      };
      xhr.send(data);
    }
  };
  
  window.addEventListener("load", function () {
    // IF DRAG-DROP UPLOAD SUPPORTED
    if (window.File && window.FileReader && window.FileList && window.Blob) {
      /* [THE ELEMENTS] */
      var uploader = document.getElementById('uploader');
  
      /* [VISUAL - HIGHLIGHT DROP ZONE ON HOVER] */
      uploader.addEventListener("dragenter", function (e) {
        e.preventDefault();
        e.stopPropagation();
        uploader.classList.add('highlight');
      });
      uploader.addEventListener("dragleave", function (e) {
        e.preventDefault();
        e.stopPropagation();
        uploader.classList.remove('highlight');
      });
  
      /* [UPLOAD MECHANICS] */
      // STOP THE DEFAULT BROWSER ACTION FROM OPENING THE FILE
      uploader.addEventListener("dragover", function (e) {
        e.preventDefault();
        e.stopPropagation();
      });
  
      // ADD OUR OWN UPLOAD ACTION
      uploader.addEventListener("drop", function (e) {
        e.preventDefault();
        e.stopPropagation();
        uploader.classList.remove('highlight');
        upcontrol.start(e.dataTransfer.files);
      });
    }
    // FALLBACK - HIDE DROP ZONE IF DRAG-DROP UPLOAD NOT SUPPORTED
    else {
      document.getElementById('uploader').style.display = "none";
    }
  });