<?php

if( $_SESSION['status']==1){
    $id_hotel=$_SESSION['id_hotel'];
    $query2 = " SELECT map.kordinat, hotel.* FROM hotel LEFT JOIN map ON hotel.id_hotel=map.id_hotel where hotel.id_hotel=$id_hotel";

    $result2 = mysql_query($query2) or die(mysql_error());

    //proses menampilkan data=
    $rows1 = mysql_fetch_object($result2);
    ?>




        <div class=" boxslider">
            <!--news flash/slider -->
            <ul>


                <li>
                    <img id='fotoSlide' src="../upload/hotel/<?php echo $rows1 -> foto1 ?>" alt="" />

                </li>
            </ul>
        
        </div>
        <?php
}else{
   echo" <img  src='../upload/hotel/dd.jpg' />";
}
?>

    <script>
        let fotoSlide = document.getElementById('fotoSlide');
        let gambar = ['../upload/hotel/<?php echo $rows1->foto1 ?>', "../upload/hotel/<?php echo $rows1 -> foto2 ?>",
            '../upload/hotel/<?php echo $rows1->foto3 ?>', '../upload/hotel/<?php echo $rows1->foto4 ?>'
        ]
        let counter = 0;

        function slide() {
            counter++;
            if (counter === 4) {
                counter = 0;
            }
            fotoSlide.setAttribute('src', gambar[counter]);
        }
        var interval;

        function show() {
            interval = setInterval(slide, 3000)

        }

        function stop() {
            clearInterval(interval);
        }


        window.addEventListener('load', show);
        fotoSlide.addEventListener('mouseover', stop);
        fotoSlide.addEventListener('mouseout', show)
    </script>