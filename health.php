<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <style>
        h2 {
            color: black;
            font-weight: bold;
            font-size: 40px;
            text-align: center;
        }

        h5 {
            color: black;
            font-size: 25px;
            text-align: center;
        }

        h3 {
            color: black;
            font-weight: bold;
            font-size: 30px;
            text-align: center;
        }

        p {
            color: black;
            font-size: 20px;
            text-align: center;
            padding: 10px;
        }

        .page-heading {
            margin: 0px 10px;
            padding: 120px 0px;
            text-align: left;
            position: relative;
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
            background-image: url(images/health_banner.jpg);
            margin-bottom: 50px;
        }

        .page-heading:after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(30, 30, 30, .7);
            z-index: 1;
        }

        .page-heading .container {
            position: relative;
            z-index: 2;
        }

        .page-heading .text-content h2 {
            color: white;
            font-size: 50px;
            text-transform: uppercase;
            text-align: center;
            font-weight: 900;
            letter-spacing: 0.5px;
        }

        .page-heading .text-content h4 {
            color: #fff;
            font-size: 25px;
            font-weight: 700;
            text-transform: uppercase;
            text-align: center;
            letter-spacing: 0.5px;
            padding-left: 200px;
            padding-right: 200px;
        }

        .health-definition,
        .health-benefits,
        .health-important,
        .health-moreInfo {
            padding: 0px 100px;
            text-align: center;
            margin-bottom: 50px;
        }

        .health-definition .column-description {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            justify-content: center;
        }

        .health-definition .definition {
            width: 200px;
            border: 1px solid black;
            border-radius: 10px;
            background-color: antiquewhite;
            text-align: center;
            padding: 20px;
        }

        .health-definition .definition img {
            width: 180px;
            height: 180px;
            margin: 10px;
        }

        .health-benefits .column-benefits {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            justify-content: center;
        }

        .health-benefits .benefits {
            width: calc(45% - 1.5rem);
            border: 1px solid black;
            border-radius: 10px;
            background-color: rgb(177, 250, 222);
            text-align: center;
            padding: 20px;
            margin-bottom: 1.5rem;
        }

        .health-benefits .benefits img {
            max-width: 100%;
            height: auto;
            margin: 10px;
        }

        .health-important .column-important {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
        }

        .health-important .column-important .column {
            flex: 1 1 30rem;
            position: relative;
            overflow: hidden;
            box-shadow: 0.5rem 1rem rgba(0, 0, 0, .1);
            border: .1rem solid rgba(0, 0, 0.3);
            cursor: pointer;
            border-radius: .5rem;
        }

        .health-important .column-important .column .image {
            height: 100%;
            width: 100%;
            object-fit: cover;
            position: absolute;
            top: -100%;
            left: 0;
        }

        .health-important .column-important .column .important {
            text-align: center;
            background: rgb(168, 250, 250);
            padding: 2rem;
        }

        .health-important .column-important .column .important img {
            margin: 1.5rem 0;
        }

        .health-important .column-important .column:hover img {
            top: 0;
        }

        .health-important .column-important .column:hover .important {
            transform: translateY(100%);
        }

        .health-moreInfo .moreInfo {
            background-color: rgb(128, 190, 204);
            box-shadow: 0 5px 10px rgba(143, 146, 177, 0.715);

        }

        .health-moreInfo img {
            width: 180px;
            height: 180px;
            margin: 10px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>

<body>
    <?php
    include("navbar2.php");
    ?>

    <section class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-content">
                        <h2>Health</h2>
                        <h4>A state of complete physical, mental and social well-being and not merely the absence of disease or infirmity.</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="health-definition">
        <div class="container">
            <div class="row">
                <h2>Definition of Health</h2>
                <h5>Health is a multifaceted concept that encompasses various dimensions of well-being. Here are some key aspects of health</h5>
                <div class="column-description">
                    <div class="definition">
                        <img src="images/physical_health.jpg" alt="Physical Health">
                        <h3>Physical Health</h3>
                        <p>Refers to the overall condition of the body, including its ability to function optimally, resist diseases, and recover from illness.</p>
                    </div>
                    <div class="definition">
                        <img src="images/mental_health.jpg" alt="Mental Health">
                        <h3>Mental Health</h3>
                        <p>Focuses on emotional well-being, cognitive functioning, and psychological resilience.</p>
                    </div>
                    <div class="definition">
                        <img src="images/social_health.jpg" alt="Social Health">
                        <h3>Social Health</h3>
                        <p>Relates to our interactions with others, social support networks, and a sense of belonging.</p>
                    </div>
                    <div class="definition">
                        <img src="images/holistic_health.jpg" alt="Holistic View">
                        <h3>Holistic View</h3>
                        <p>Health is not merely the absence of disease; it’s a positive state of complete physical, mental, and social well-being.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="health-benefits">
        <div class="container">
            <div class="row">
                <h2>Benefits of Good Health</h2>
                <h5>Maintaining good health offers numerous advantages</h5>
                <div class="column-benefits">
                    <div class="benefits">
                        <img src="images/longevity.png" alt="Longevity">
                        <h3>Longevity</h3>
                        <p>People in good health tend to live longer and enjoy a higher quality of life.</p>
                    </div>
                    <div class="benefits">
                        <img src="images/productivity.png" alt="Productivity">
                        <h3>Productivity</h3>
                        <p>Healthy individuals are more productive, both at work and in their personal lives.</p>
                    </div>
                    <div class="benefits">
                        <img src="images/reduced_healthcare_costs.png" alt="Reduced Healthcare Costs">
                        <h3>Reduced Healthcare Costs</h3>
                        <p>Preventing illnesses through good health practices reduces medical expenses.</p>
                    </div>
                    <div class="benefits">
                        <img src="images/emotional_resilience.png" alt="Emotional Resilience">
                        <h3>Emotional Resilience</h3>
                        <p>Good health contributes to better stress management and emotional stability.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="health-important">
        <div class="container">
            <div class="row">
                <h2>Importance of Health</h2>
                <h5>Health is crucial for several reasons</h5>
                <div class="column-important">
                    <div class="column">
                        <img class="image" src="images/quality_of_life_1.jpg" alt="Quality of Life">
                        <div class="important">
                            <img src="images/quality_of_life_2.jpg" alt="Quality of Life">
                            <h3>Quality of Life</h3>
                            <p>Good health enhances our ability to engage in daily activities, pursue hobbies, and enjoy life.</p>
                        </div>
                    </div>

                    <div class="column">
                        <img class="image" src="images/prevention_1.jpeg" alt="Prevention">
                        <div class="important">
                            <img src="images/prevention_2.png" alt="Prevention">
                            <h3>Prevention</h3>
                            <p>Maintaining health helps prevent diseases and reduces the risk of chronic conditions.</p>
                        </div>
                    </div>

                    <div class="column">
                        <img class="image" src="images/community_well_being_1.jpeg" alt="Community Well-Being">
                        <div class="important">
                            <img src="images/community_well_being_2.png" alt="Community Well-Being">
                            <h3>Community Well-Being</h3>
                            <p>Healthy individuals contribute positively to their families, communities, and society at large.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="health-moreInfo">
        <div class="container">
            <div class="row">
                <h2>Guide for Getting Health</h2>
                <h5>Provide readers with practical steps and advice for achieving and maintaining good health.</h5>

                <div class="moreInfo">
                    <tr>
                        <div class="col-md-6">
                            <img src="images/nutrition.png" alt="Nutrition">
                            <h3>Nutrition</h3>
                            <p>Discuss the role of balanced diets, vitamins, and minerals in promoting health.</p>
                        </div>
                    </tr>

                    <hr style="border-color: aliceblue;">

                    <tr>
                        <div class="col-md-6">
                            <img src="images/physical_activity.png" alt="Physical Activity">
                            <h3>Physical Activity</h3>
                            <p>Highlight the importance of regular exercise for overall well-being.</p>
                        </div>
                    </tr>

                    <hr style="border-color: aliceblue;">

                    <tr>
                        <div class="col-md-6">
                            <img src="images/sleep.png" alt="Sleep">
                            <h3>Sleep</h3>
                            <p>Address the significance of adequate rest for physical and mental health.</p>
                        </div>
                    </tr>

                    <hr style="border-color: aliceblue;">

                    <tr>
                        <div class="col-md-6">
                            <img src="images/hydration.png" alt="Hydration">
                            <!--https://www.freepik.com/icon/water-cycle_999049#fromView=search&page=1&position=33&uuid=45797d69-c739-4d7e-afca-e84399b26ca5-->
                            <h3>Hydration</h3>
                            <p>Explain the benefits of staying hydrated.</p>
                        </div>
                    </tr>

                    <hr style="border-color: aliceblue;">

                    <tr>
                        <div class="col-md-6">
                            <img src="images/stress management.png" alt="Stress Management">
                            <!--https://www.freepik.com/icon/stress_6554658#fromView=search&page=1&position=22&uuid=af226193-e8a3-44b7-8de4-4c7cfd2d8789-->
                            <h3>Stress Management</h3>
                            <p>Provide tips for managing stress effectively.</p>
                        </div>
                    </tr>

                    <br>
                </div>
            </div>
        </div>
    </section>
</body>

</html>