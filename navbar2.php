<style>
    /* Google Font */
    @import url("https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap");

    /* Font Awesome */
    @import url("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css");

    * {
        font-family: "Rubik", sans-serif;
    }

    header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: fixed;
        z-index: 100;
        top: 0;
        left: 0;
        width: 95.4%;
        padding: 0.8rem 3rem;
        background-color: hsl(194, 28%, 45%);
        transition: background-color 0.3s;
    }

    /* header.scrolled {
        background-color: hsl(194, 28%, 30%);
    } */

    .fa-caret-down {
        padding-left: 5px;
    }

    .logo {
        font-size: 2rem;
        color: white;
        text-decoration: none;
        font-weight: 500;
        transition: 0.3s;
    }

    .logo:hover {
        color: hsl(85, 100%, 70%);
    }

    nav {
        display: flex;
        gap: 30px;
        justify-content: center;
        align-items: center;
    }

    nav a {
        font-size: 1.5rem;
        color: white;
        text-decoration: none;
        font-weight: 450;
        /* margin-left: 2rem; */
        transition: 0.3s;
    }

    nav a:hover,
    nav a.active {
        color: hsl(85, 100%, 70%);
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: flex;
        flex-direction: column;
        position: absolute;
        gap: 0.7rem;
        width: max-content;
        /* width: 220px; */
        z-index: 100;
        /* height: 100px;
        padding-top: 20px;
        margin-left: -28px; */
        top: 100%;
        left: 50%;
        transform: translateX(-50%);
        padding: 1rem 1rem;
        text-align: center;
        opacity: 0;
        pointer-events: none;
        background-color: hsl(194, 28%, 45%);
        transition: opacity 0.2s ease;
    }

    .dropdown-content a {
        margin: 0;
        opacity: 0;
        transition: opacity 0.2s ease, color 0.3s;
    }

    .dropdown:hover .dropdown-content {
        opacity: 1;
        pointer-events: auto;
    }

    .dropdown:hover .dropdown-content a {
        opacity: 1;
    }

    .user-profile {
        background-color: hsl(18, 73%, 69%);
        border-radius: 10px;
        padding: 0.5rem 0.5rem;
        transition: background-color 0.2s ease;
    }

    .user-profile:hover {
        background-color: hsl(18, 73%, 50%);
    }

    .user-profile a:hover {
        color: hsl(85, 100%, 70%);
    }

    /* custom scrollbar */
    body::-webkit-scrollbar {
        width: 0.8rem;
    }

    body::-webkit-scrollbar-track {
        box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
    }

    body::-webkit-scrollbar-thumb {
        background-color: hsl(0, 0%, 66%);
        outline: 1px solid hsl(210, 13%, 50%);
        border-radius: 50px;
    }

    body::-webkit-scrollbar-thumb:hover {
        background-color: hsl(0, 0%, 50%);
    }

    body::-webkit-scrollbar-thumb:active {
        background-color: hsl(0, 0%, 30%);
    }
</style>

<header>
    <a href="index.php#home" class="logo">HND</a>

    <nav>
        <a href="index.php#home">Home</a>
        <a href="index.php#health">Health</a>
        <a href="index.php#nutrition">Nutrition</a>
        <a href="index.php#diet">Diet</a>
        <div class="dropdown">
            <a href="index.php#tools">Tools <i class="fa-solid fa-caret-down"></i></a>
            <div class="dropdown-content">
                <a href="bmi.php">BMI Calculator</a>
                <a href="bmr.php">BMR Calculator</a>
                <a href="calorie.php">Calorie Calculator</a>
                <a href="food-nutrition.php">Food Nutrition Info</a>
            </div>
        </div>
        <a href="index.php#contact">Contact</a>

        <div class="dropdown user-profile">
            <a href="view-profile.php">
                <?php echo htmlspecialchars($_SESSION['username']); ?>
                <i class="fa-solid fa-caret-down"></i></a>
            <div class="dropdown-content">
                <a href="view-profile.php">View Profile</a>
                <a href="edit-profile.php">Edit Profile</a>
                <a href="logout.php" onclick="return confirm('Are you sure you want to log out?');">Logout</a>
            </div>
        </div>
    </nav>
</header>