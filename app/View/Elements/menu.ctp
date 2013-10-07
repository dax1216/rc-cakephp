          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="/">Home</a></li>
              <li><a href="/about">About</a></li>              
              <li><a href="/contact">Contact</a></li>
<?php   if($access->isLoggedin()) { ?>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Control Panel <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="/users">Users</a></li>
                  <li><a href="/roles">Roles</a></li>
                  <li><a href="/permissions">Permissions</a></li>
                </ul>
              </li>
<?php   } ?>
            </ul>
            <ul class="nav pull-right">
<?php   if(!$access->isLoggedin()) { ?>
                <li><a href="/account/login">Sign In</a></li>
                <li><a href="/account/register">Register</a></li>
<?php   } else { ?>
                <li><a href="/account/">My Profile</a></li>
                <li><a href="/account/logout">Logout</a></li>
<?php   } ?>
            </ul>
          </div><!--/.nav-collapse -->