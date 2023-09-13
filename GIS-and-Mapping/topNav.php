<?php
include 'session.php';
?>

<head>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap');
        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }
        .logo{
            background-image: url(image/logo.png);
            background-repeat: no-repeat;
        }
        /* Basic styles for the navigation bar */
        .navbar {
            border-radius:none;
            font-family: 'Roboto', sans-serif;
            background-color: #DC8449;  
            overflow: hidden;
            display: flex;
            justify-content: space-between; /* Center and separate the content */
            align-items: center;
            
        }

        .navbar div.logo {
            color: #FFFADD;
            font-size: 24px;
            padding: 0 16px; /* Add space around the logo */
        }

        .navbar a {
            color: white;
            text-align: center;
            text-decoration: none;
            padding: 14px 16px;
            text-transform:uppercase;
        }

        /* Center-align the list content */
        .navbar .center-content {
            text-align: center;
            flex-grow: 1; /* Allow the content to grow and center */
        }

        /* Add a hover effect for the links */
        .navbar a:hover {
            text-decoration: underline;
            color: #FFFADD;
        }

        

        /* Media query for responsiveness */
        @media screen and (max-width: 600px) {
            .navbar {
                flex-direction: column; /* Stack items vertically on smaller screens */
                align-items: flex-start; /* Align items to the left on smaller screens */
            }

            .navbar .center-content {
                text-align: left; /* Align centered content to the left on smaller screens */
                padding-left: 16px; /* Add some left padding to center content */
                padding-top: 10px; /* Add top padding for spacing */
            }
        }
    </style>

<div class="navbar">
<div class="logo"></div>
    <div class="center-content">
    <a href="#services">forum</a>
    <a href="#home">announcement</a>
    <a href="#about">newsletter</a>
    <a href="#contact">event</a>
    <a href="#services">social media</a>
    </div>
    <a href="#last">Last</a>
</div>
