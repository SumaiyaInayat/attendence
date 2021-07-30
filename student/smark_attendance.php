<?php
   global $data;
   session_start();
   $a=$_SESSION['student_name'];
   if(isset($_POST['res']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH'])) {     
       $data=$_POST['res'];
       echo json_encode($data);
       if ($data==$a){
           $myfile = fopen("student_attendance_record/".$data.".txt", "w") or die("Unable to open file!");
           fwrite($myfile, $data);
           fclose($myfile);
       }
       die();      
    }
    if(isset($_POST['submit']))
    {    
        $myfile1 = fopen("student_attendance_record/".$a.".txt", "a") or die("Unable to open file!");  
        if(file_get_contents("student_attendance_record/".$a.".txt")){
            
            header('location:student_dashboard.php');
            
        }
        else echo "mark attendance first";
    }

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Face Recognition</title>


    <style>
        button{
            margin-bottom:20px;
            background-color:green;
            color:white;
            position:400px;
            border:8px solid green;
            border-radius:10px;
            width:100px;
            height 100px;
        }
        body {
            margin: 0;
            padding: 0;
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        canvas {
            position: absolute;
        }
    </style>
</head>

<body>
<?php include "../db_connection.php";
$select="SELECT student_name FROM student";
$run=mysqli_query($conn,$select);
while($row_user=mysqli_fetch_array($run)){
    $student_name = $row_user['student_name'];
    $php_framework[] = $student_name;
}
print_r($php_framework);
?>

<form method="post">
   <button type="submit" name="submit" value="submit">SAVE</button>
</form>
    <video id="videoInput" width="450" height="450" muted controls>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <div id = "random"></div>
        <script src="../face-api.min.js"></script>

        <script>

            const video = document.getElementById('videoInput')

            Promise.all([
                faceapi.nets.faceRecognitionNet.loadFromUri('../models'),
                faceapi.nets.faceLandmark68Net.loadFromUri('../models'),
                faceapi.nets.ssdMobilenetv1.loadFromUri('../models')


            ]).then(start)


            function start() {
                document.body.append('Models Loaded')

                navigator.getUserMedia(
                    { video: {} },
                    stream => video.srcObject = stream,
                    err => console.error(err)
                )
                console.log('video added')
                recognizeFaces()
            }

            async function recognizeFaces() {

                const labeledDescriptors = await loadLabeledImages()
                // console.log(labeledDescriptors)
                const faceMatcher = new faceapi.FaceMatcher(labeledDescriptors, 0.6)


                video.addEventListener('play', async () => {
                    console.log('Playing')
                    const canvas = faceapi.createCanvasFromMedia(video)
                    document.body.append(canvas)

                    const displaySize = { width: video.width, height: video.height }
                    faceapi.matchDimensions(canvas, displaySize)



                    setInterval(async () => {
                        const detections = await faceapi.detectAllFaces(video).withFaceLandmarks().withFaceDescriptors()

                        const resizedDetections = faceapi.resizeResults(detections, displaySize)

                        canvas.getContext('2d').clearRect(0, 0, canvas.width, canvas.height)

                        const results = resizedDetections.map((d) => {
                            return faceMatcher.findBestMatch(d.descriptor)
                        })


                        results.forEach((result, i) => {
                            const box = resizedDetections[i].detection.box
                            const drawBox = new faceapi.draw.DrawBox(box, { label: result.toString() })
                            drawBox.draw(canvas)

                            
                            if (result.label != "unknown")
                                var res=result.label
                                console.log(res)
                                $(document).ready(function() {
    
                                
                                $.ajax({
                                url: "smark_attendance.php",
                                method: "POST",
                                dataType: "json",
                                data: {res:res},
                                success: function (result) {
                                    // alert("name is " + result);
                                    $("#random").html(result);
                                }
                                });
                                
                                });                              
                        })
                    }, 100)



                })
            }

            function loadLabeledImages() {
                
                var labels = <?php echo '["'.implode('","',$php_framework).'"]' ;?>;
                // const labels = ['Sufiyan Irfan', 'Black Widow', 'Captain America']
                console.log(labels);
                return Promise.all(
                    labels.map(async (label) => {
                        const descriptions = []
                        // for (let i = 1; i <= 2; i++) {
                            const img = await faceapi.fetchImage(`..//student_images/${label}.jpg`)
                           
                            const detections = await faceapi.detectSingleFace(img).withFaceLandmarks().withFaceDescriptor()
                            // console.log(label + i + JSON.stringify(detections))
                            descriptions.push(detections.descriptor)
                        // }
                        document.body.append(label + ' Faces Loaded | ')
                        return new faceapi.LabeledFaceDescriptors(label, descriptions)

                    })
                )
            }
        </script>
      
</body>
</html>

 

