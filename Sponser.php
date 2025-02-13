<?php
$sponsors = [
    [
        "name" => "Sri Krishn Jewellers",
        "logo" => "./Images/sponser1.jpg",
        "location" => "https://www.google.com/maps/place/Sri+Krishn+Jewellers"
    ],
    [
        "name" => "Rahul Communication",
        "logo" => "./Images/sponser3.jpg",
        "location" => "https://www.google.com/search?q=rahul+communication+mandi"
    ],
    [
        "name" => "Education Point",
        "logo" => "./Images/sponser2.jpg",
        "location" => "https://www.google.com/maps/place/Education+Point"
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Sponsors</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.sponsor-slider').slick({
                dots: true,
                infinite: true,
                speed: 500,
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: { slidesToShow: 2 }
                    },
                    {
                        breakpoint: 600,
                        settings: { slidesToShow: 1 }
                    }
                ]
            });
        });
    </script>
</head>
<body>
    <section class="container text-center my-5">
        <h2 class="text-2xl font-semibold mb-4">Our Sponsors</h2>
        <div class="sponsor-slider">
            <?php foreach ($sponsors as $sponsor) : ?>
                <div class="sponsor-item text-center">
                    <a href="<?php echo $sponsor['location']; ?>" target="_blank">
                        <img src="<?php echo $sponsor['logo']; ?>" alt="<?php echo $sponsor['name']; ?> Logo" class="img-fluid mb-2" style="height: 100px; object-fit: contain;">
                    </a>
                    <p class="text-lg"><?php echo $sponsor['name']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</body>
</html>
