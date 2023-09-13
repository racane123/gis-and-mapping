<?php
include 'session.php';

?>
<style>
        .sidebar-container {
            background-color:#040D12;
            height: 100%;
            width: 200px;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
            z-index: 1;
            overflow-y: auto; /* Add scroll when content exceeds viewport height */
        }
        
        .sidebar {
            padding-bottom: 20px; /* Add padding to create scroll space at the bottom */
        }

        .profile-section {
            
            margin-top: 20px;
        }

        .sidebar a {
            padding:20px;
            text-align: center;
            text-decoration: none;
            color:#93B1A6;
            display: block;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background-color:#183D3D;
            color: white;
            
        }

        .profile-image {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: #ccc; /* Replace with your image */
            margin: 0 auto;
        }

        .profile-text {
            margin-top: 40px;
            text-align: center;
            color: #fff;
            margin-bottom:60px;
        }


        .material-symbols-outlined {
            font-variation-settings:
                'FILL' 0,
                'wght' 400,
                'GRAD' 0,
                'opsz' 24;
            padding: 10px;
        }
    </style>
</head>
<body>

<div class="sidebar-container">
    <div class="sidebar">
        <div class="profile-section">
            <div class="profile-image"></div>
            <div class="profile-text">
                <h2><?php echo $firstname . " " . $lastname; ?></h2>
                <p><?php echo $role; ?></p>
            </div>
        </div>
        <div class="scrollable-sidenav">
        <a href="#" onclick="showMapData()">Map Data</a>
        <a href="#" onclick="showReportAnalytics()">Report &amp; Analytics</a>
        <a href="#" onclick="showUserManagement()">Accounts</a>
        <a href="#" onclick="showServicesContent()">Services</a>
        <a href="logout.php">Logout</a>
    </div>
</div>
</div>
</body>
