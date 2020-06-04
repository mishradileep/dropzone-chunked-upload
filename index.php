<html>
  <head>
    <script src="lib/dropzone.js"></script>
    <script src="jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="lib/dropzone.css">

    <style>
      body {
        background: rgb(243, 244, 245);
        height: 100%;
        color: rgb(100, 108, 127);
        line-height: 1.4rem;
        font-family: Roboto, "Open Sans", sans-serif;
        font-size: 20px;
        font-weight: 300;
        text-rendering: optimizeLegibility;
      }

      h1 { text-align: center; }

      .dropzone {
        background: white;
        border-radius: 5px;
        border: 2px dashed rgb(0, 135, 247);
        border-image: none;
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
      }
  </style>

  </head>
  <body>

  <h1>DropzoneJS File Upload Demo</h1>
    <section>
      <div id="dropzone">
        <form class="dropzone needsclick" id="demoUpload">
          <div class="dz-message needsclick">    
            Drop files here or click to upload.<BR>
            <SPAN class="note needsclick">(This is just a demo dropzone. Selected 
            files are <STRONG>not</STRONG> actually uploaded.)</SPAN>
          </div>
        </form>
      </div>
    </section>

  <br/>
  <hr size="3" noshade color="#F00000">



  <script src="dropzone-integration.js"></script>
  </body>
  </html>