<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>

<style>
    body{
        background-color:#5C8374;
    }
    section {
        margin-left: 200px; /* Adjust the margin to accommodate the sidebar width */
        padding: 20px;
    }
</style>

<script>
    // Function to show user management content
    function showUserManagement() {
        fetch('usermanagement.php') // Use fetch to load the content dynamically
            .then(response => response.text())
            .then(content => {
                document.getElementById("dynamicContent").innerHTML = content;
            })
            .catch(error => {
                console.error('Error loading content: ', error);
            });
    }

    // Function to show Map Data
    function showMapData() {
        fetch('admindashboard.php')
        .then(response => response.txt())
        .then(content => {
            document.getElementById('dynamicContent').innerHTML = content;
        })
        .catch(error=>{
            console.error('Error loading content: ', error);
        });
        
    }
    function showServicesContent() {
        document.getElementById("dynamicContent").innerHTML = "<p>Hello This is the map Data</p>";
    }
    function showReportAnalytics() {
        document.getElementById("dynamicContent").innerHTML = "<p>Hello This is the report analysis</p>";
    }



    
</script>

<body>
<div class="sidebar-nav">
    <?php include 'sideNav.php'?>
</div>
<section id="dynamicContent"><?php include 'mapData.php'?></section>

    
</body>
</html>
