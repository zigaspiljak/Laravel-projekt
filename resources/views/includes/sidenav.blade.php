<style>
    .sidenav {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 99;
        top: 0;
        left: 0;
        background-color: rgba(var(--secondary-background-color), 1);
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
    }

    .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: rgba(var(--primary-text-color), var(--opacity-value-30));
        display: block;
        transition: 0.5s;
    }

    .sidenav a:hover {
        color: rgba(var(--primary-text-color), 1);
    }

    .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }

    #main {
        color: rgba(var(--primary-text-color), var(--opacity-value-30));
        transition: margin-left .5s;
        padding: 16px;
        transition: 0.5s;
    }

    #main:hover {
        color: rgba(var(--primary-text-color), 1);
    }

    #spanPointer {
        color: rgba(var(--primary-text-color), var(--opacity-value-30));
        transition: 0.5s;
    }

    #spanPointer:hover {
        color: rgba(var(--primary-text-color), 1);
    }

    @media screen and (max-height: 450px) {
        .sidenav {
            padding-top: 15px;
        }

        .sidenav a {
            font-size: 18px;
        }
    }

    .sidenav>hr {
        border: 0px !important;
        border-bottom: 2px solid rgba(var(--tertiary-background-color), 1) !important;
    }

</style>

<div id="mainSideNav" class="sidenav">
    @auth
    <a href="{{ route('get.welcome') }}">Projects</a>
    <a href="{{ route('get.add_project') }}">Add Project</a>
    <a href="{{ route('get.users') }}">Users</a>
    <a href="{{ route('get.logout') }}">Logout</a>
    @else
    <a href="{{ route('get.login') }}">Login</a>
    <a href="{{ route('get.register') }}">Register</a>
    @endauth
</div>

<script>
    let sidebarOpen = false;
    function openNav() {
        if (sidebarOpen === false) {
            document.getElementById("mainSideNav").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
            document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
            sidebarOpen = true;
            document.getElementById('spanPointer').innerhtml = '&times;';
        } else if (sidebarOpen === true) {
            document.getElementById("mainSideNav").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
            document.body.style.backgroundColor = "white";
            sidebarOpen = false;
            document.getElementById('spanPointer').innerhtml = '&#9776;';
        }

    }



</script>
