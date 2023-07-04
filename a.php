

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <script src="https://kit.fontawesome.com/a59b9b09ab.js" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Our History</title>
        <link rel="stylesheet" href="histor.css">
        <link rel="icon" href="2.jpeg">   


    </head>

    <body>
        <h1 style=" font-size: 36px; font-family: Playfair Display, sans-serif;">Our History.</h1>
        <h2 style="font-family: Garamond, sans-serif;">Experience the joy of aging gracefully with us.</h2>
        <iframe 
            width="560" 
            height="315" 
            src="https://www.youtube.com/embed/csx7BtT73D8" 
            frameborder="0" 
            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
            allowfullscreen>
        </iframe>

        <p class="paragraph">The Elderly Home's Club is a social welfare organisation that provides poor seniors with shelter,
            support, and medical services. It is a charitable organisation. The organisation hopes that by establishing homes 
            for the elderly, the poor and homeless will now have a place to call home, as well as a better quality of life. 
            It was founded in the early 1980s by a group of dedicated volunteers who recognized the need for a place where 
            older adults could socialize, engage in activities, and receive the care they needed to maintain their independence.
        <p>

        <img class="image" src="Images/our/care.jpg" alt="eldercare Image">

        <p class="paragraph">Throughout its history, Elderly Home's Club has remained committed to its mission of providing 
            personalized care and support to seniors in our community. The organization's staff and volunteers are passionate 
            about their work and are dedicated to creating a welcoming and supportive environment for all of its members.
        <p>

        <img class="image" src="Images/our/care1.jpg" alt="eldercare Image">

        <p class="paragraph">Looking to the future, Elderly Home's Club is committed to continuing its legacy of service and 
            innovation in the field of senior care. With a focus on meeting the changing needs of the community, the organization 
            remains dedicated to helping older adults live with dignity, respect, and independence.
        <p>

        <div class="main-scroll-div">
            <div>
                <button class="icon" onclick="scrolll()"><i class="fas fa-angle-double-left"></i></button>
            </div>
            <div class="cover">
                <div class="scroll-images">
                    <div class='child'><img class='child-img' src="Images/our/care2.jpg" alt="image"></div>
                    <div class='child'><img class='child-img' src="Images/our/care3.jpg" alt="image"></div>
                    <div class='child'><img class='child-img' src="Images/our/care4.jpeg" alt="image"></div>
                    <div class='child'><img class='child-img' src="Images/our/care5.jpeg" alt="image"></div>
                    <div class='child'><img class='child-img' src="Images/our/care6.jpeg" alt="image"></div>
                    <div class='child'><img class='child-img' src="Images/our/care7.jpg" alt="image"></div>
                    <div class='child'><img class='child-img' src="Images/our/care8.jpg" alt="image"></div>
                    <div class='child'><img class='child-img' src="Images/our/care9.jpeg" alt="image"></div>
                    <div class='child'><img class='child-img' src="Images/our/care10.jpg" alt="image"></div>
                </div>
            </div>
            <div>
                <button class="icon" onclick="scrollr()"><i class="fas fa-angle-double-right"></i></button>
            </div>
        </div>
    </body>

<script>
function scrolll() {
var left = document.querySelector(".scroll-images");
left.scrollBy(-350, 0);
}

function scrollr() {
var right = document.querySelector(".scroll-images");
right.scrollBy(350, 0);
}
</script>

</html>