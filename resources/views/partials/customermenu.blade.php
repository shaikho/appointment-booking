<style>
    @import url("https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap");
    * {
      box-sizing: border-box;
      padding: 0;
      margin: 0;
    }

    body {
      font-family: "Roboto", sans-serif;
      font-size: 0.925rem;
    }

    a {
      text-decoration: none;
    }

    .container {
      width: 1170px;
      position: relative;
      margin-left: auto;
      margin-right: auto;
      padding-left: 15px;
      padding-right: 15px;
    }

    .navbar,
    .navbar .container {
      width: 100%;
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      justify-content: space-between;
    }
    @media (max-width: 768px) {
      .navbar,
      .navbar .container {
        display: block;
      }
    }

    .navbar {
      padding: 1.15rem 1rem;
      box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.035);
      background-color: #fff;
      /*
|-----------------------------------
| Start navbar logo or brand etc..
|-----------------------------------
*/
      /*
|-----------------------------------
| Start navbar menu
|-----------------------------------
*/
    }
    @media (min-width: 576px) {
      .navbar .container {
        max-width: 540px;
      }
    }
    @media (min-width: 768px) {
      .navbar .container {
        max-width: 720px;
      }
    }
    @media (min-width: 992px) {
      .navbar .container {
        max-width: 960px;
      }
    }
    @media (min-width: 1200px) {
      .navbar .container {
        max-width: 1140px;
      }
    }
    .navbar .navbar-header {
      display: flex;
      align-items: center;
    }
    @media (max-width: 768px) {
      .navbar .navbar-header {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-direction: row-reverse;
      }
    }
    .navbar .navbar-header .navbar-toggler {
      border-radius: 5px;
      background-color: transparent;
      cursor: pointer;
      border: none;
      display: none;
      outline: none;
    }
    @media (max-width: 768px) {
      .navbar .navbar-header .navbar-toggler {
        display: block;
      }
    }
    .navbar .navbar-header .navbar-toggler span {
      height: 2px;
      width: 22px;
      background-color: #929aad;
      display: block;
    }
    .navbar .navbar-header .navbar-toggler span:not(:last-child) {
      margin-bottom: 0.2rem;
    }
    .navbar .navbar-header > a {
      font-weight: 500;
      color: #3c4250;
    }
    .navbar .navbar-menu {
      display: flex;
      flex-basis: auto;
      flex-grow: 1;
      align-items: center;
    }
    @media (max-width: 768px) {
      .navbar .navbar-menu {
        display: none;
        text-align: center;
      }
    }
    .navbar .navbar-menu .navbar-nav {
      margin-left: auto;
      flex-direction: row;
      display: flex;
      padding-left: 0;
      margin-bottom: 0;
      list-style: none;
    }
    @media (max-width: 768px) {
      .navbar .navbar-menu .navbar-nav {
        width: 100%;
        display: block;
        border-top: 1px solid #eee;
        margin-top: 1rem;
      }
    }
    .navbar .navbar-menu .navbar-nav > li > a {
      color: #3c4250;
      text-decoration: none;
      display: inline-block;
      padding: 0.5rem 1rem;
    }
    .navbar .navbar-menu .navbar-nav > li > a:hover {
      color: #EE9BA3;
    }
    @media (max-width: 768px) {
      .navbar .navbar-menu .navbar-nav > li > a {
        border-bottom: 1px solid #eee;
      }
    }
    .navbar .navbar-menu .navbar-nav > li.active a {
      color: #EE9BA3;
    }
    .navbar .navbar-menu .navbar-nav .navbar-dropdown .dropdown {
      list-style: none;
      position: absolute;
      top: 150%;
      left: 0;
      background-color: #fff;
      padding: 0.5rem 0;
      min-width: 160px;
      width: auto;
      white-space: nowrap;
      box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
      z-index: 99999;
      border-radius: 0.75rem;
      display: none;
    }
    @media (max-width: 768px) {
      .navbar .navbar-menu .navbar-nav .navbar-dropdown .dropdown {
        position: relative;
        box-shadow: none;
      }
    }
    .navbar .navbar-menu .navbar-nav .navbar-dropdown .dropdown li a {
      color: #3c4250;
      padding: 0.25rem 1rem;
      display: block;
    }
    .navbar .navbar-menu .navbar-nav .navbar-dropdown .dropdown.show {
      display: block !important;
    }
    .navbar .navbar-menu .navbar-nav .dropdown > .separator {
      height: 1px;
      width: 100%;
      margin: 9px 0;
      background-color: #eee;
    }
    .navbar .navbar-dropdown {
      position: relative;
    }

    .navbar .navbar-header > a span {
      color: #EE9BA3;
    }

    .navbar .navbar-header h4 {
      font-weight: 500;
      font-size: 1.25rem;
    }
    @media (max-width: 768px) {
      .navbar .navbar-header h4 {
        font-size: 1.05rem;
      }
    }
  </style>

<nav class="navbar" style="background-color: #e6e1e1;background-image:url({{asset("/assets/images/lined-paper.png")}})">
    <div class="container">
      <div class="navbar-header">
        <button class="navbar-toggler" data-toggle="open-navbar1">
          <span></span>
          <span></span>
          <span></span>
        </button>
        <a href="{{ route("admin.home") }}" style="text-decoration: none">
          <h4>Appointment<span> picker</span></h4>
        </a>
      </div>

      <div class="navbar-menu" id="open-navbar1">
        <ul class="navbar-nav">
          <li class="">

              <a href="{{ route("admin.home") }}">
                <i class="nav-icon fa-fw fas fa-home"></i>
                {{ trans('global.home') }}</a></li>
          <li class="{{ request()->is('admin/system-calendar') || request()->is('admin/system-calendar/*') ? 'active' : '' }}"><a href="{{ route("admin.systemCalendar") }}">
            <i class="nav-icon fa-fw fas fa-calendar">
            </i>
            {{ trans('global.systemCalendar') }}
        </a></li>
          <li class="navbar-dropdown {{ request()->is('admin/pendingappointments') || request()->is('admin/approvedappointments') ? 'active' : '' }}">
            <a href="#" class="dropdown-toggler" data-dropdown="blog">
                <i class="nav-icon fa-fw fas fa-calendar-minus-o">
                </i>
                {{ trans('cruds.appointment.title') }} <i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown" id="blog">
                <li><a href="{{ route("admin.draftedappointments") }}"> <i class="nav-icon fa-fw fas fa-edit"></i>&nbsp;{{ trans('cruds.drafted_appointment.menu_title') }}</a></li>
                <li class="separator"></li>
              <li><a href="{{ route("admin.pendingappointments") }}"> <i class="nav-icon fa-fw fas fa-hourglass-start"></i>&nbsp;{{ trans('cruds.pending_appointment.menu_title') }}</a></li>
              <li class="separator"></li>
              <li><a href="{{ route("admin.approvedappointments") }}"> <i class="nav-icon fa-fw fas fa-check-circle"></i>&nbsp;{{ trans('cruds.approved_appointment.menu_title') }}</a></li>
            </ul>
          </li>
          @can('service_access')
            <li class="navbar-dropdown {{ request()->is('admin/services') || request()->is('admin/services/*') ? 'active' : '' }}">
                <a href="{{ route("admin.services.index") }}"><i class="nav-icon fa-fw fas fa-list-alt"></i>  {{ trans('cruds.service.title') }}</a></li>
          @endcan
          @can('employee_access')
            <li class="navbar-dropdown {{ request()->is('admin/employees') || request()->is('admin/employees/*') ? 'active' : '' }}"><a href="{{ route("admin.employees.index") }}"> <i class="nav-icon fa-fw fas fa-users"></i>  {{ trans('cruds.employee.title') }}</a></li>
          @endcan
          <li class="navbar-dropdown {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}"><a href="{{ route('admin.users.edit',Session::get('user_id')) }}" > <i class="nav-icon fa-fw fas fa fa-id-card-o"></i> {{ trans('global.profile') }}</a></li>
          <li><a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
            <i class="nav-icon fa-fw fas fa fa-sign-out"></i>
            Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <script>

    // Updated: 23-4-2020
    // I've moved the old navbar `pen` to: https://codepen.io/themustafaomar/pen/YzyNQXV
    // Since it was old and coded badly this is a new one build with pure Javascript

    // Other important pens.
    // Map: https://codepen.io/themustafaomar/pen/ZEGJeZq
    // Dashboard: https://codepen.io/themustafaomar/pen/jLMPKm

    let dropdowns = document.querySelectorAll(".navbar .dropdown-toggler");
    let dropdownIsOpen = false;

    // Handle dropdown menues
    if (dropdowns.length) {
      // Usually I don't recommend doing this (adding many event listeners to elements have the same handler)
      // Instead use event delegation: https://javascript.info/event-delegation
      // Why: https://gomakethings.com/why-event-delegation-is-a-better-way-to-listen-for-events-in-vanilla-js
      // But since we only have two dropdowns, no problem with that.
      dropdowns.forEach((dropdown) => {
        dropdown.addEventListener("click", (event) => {
          let target = document.querySelector(
            "#" + event.target.dataset.dropdown
          );

          if (target) {
            if (target.classList.contains("show")) {
              target.classList.remove("show");
              dropdownIsOpen = false;
            } else {
              target.classList.add("show");
              dropdownIsOpen = true;
            }
          }
        });
      });
    }

    // Handle closing dropdowns if a user clicked the body
    window.addEventListener("mouseup", (event) => {
      if (dropdownIsOpen) {
        dropdowns.forEach((dropdownButton) => {
          let dropdown = document.querySelector(
            "#" + dropdownButton.dataset.dropdown
          );
          let targetIsDropdown = dropdown == event.target;

          if (dropdownButton == event.target) {
            return;
          }

          if (!targetIsDropdown && !dropdown.contains(event.target)) {
            dropdown.classList.remove("show");
          }
        });
      }
    });

    // Open links in mobiles
    function handleSmallScreens() {
      document.querySelector(".navbar-toggler").addEventListener("click", () => {
        let navbarMenu = document.querySelector(".navbar-menu");

        if (navbarMenu.style.display === "flex") {
          navbarMenu.style.display = "none";
          return;
        }

        navbarMenu.style.display = "flex";
      });
    }

    handleSmallScreens();
  </script>
