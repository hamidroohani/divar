
    <style>
        #mySidenav a {
            position: absolute;
            left: -80px;
            transition: 0.3s;
            padding: 15px;
            width: 100px;
            text-decoration: none;
            font-size: 20px;
            color: white;
            border-radius: 0 5px 5px 0;
        }

        #mySidenav a:hover {
            left: 0;
        }

        #about {
            top: 70px;
            background-color: #4CAF50;
        }

        .article {
            top: 160px;
            background-color: #2196F3;
        }

        #projects {
            top: 250px;
            background-color: #f44336;
        }

        #contact {
            top: 340px;
            background-color: #555
        }
    </style>


<div id="mySidenav" class="sidenav">
    <a href="/admin-panel/users" id="about">list of Users</a>
    <a class="article" href="/admin-panel/items">list of Items</a>
    <a href="/admin-panel/category" id="projects">list of Categories</a>
    <a href="/admin-panel/location" id="contact">list of Locations</a>
</div>


