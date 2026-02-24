<?php include 'includes/header.php'; ?>	


<div class="page-header">
    <h1>
        Admin Profile Page
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            See Admin Information and Edit Profile
        </small>
    </h1>
</div>

<div id="user-profile-2" class="user-profile">
    <div class="tabbable">

        <ul class="nav nav-tabs padding-18">
            <li class="active">
                <a data-toggle="tab" href="#home">
                    <i class="green ace-icon fa fa-user bigger-120"></i>
                    Profile
                </a>
            </li>
        </ul> <!-- You forgot this closing tag -->

        <div class="tab-content no-border padding-24">
            <div id="home" class="tab-pane in active">
                <div class="row">

                    <div class="col-xs-12 col-sm-3 center">
                        <span class="profile-picture">
                            <img class="editable img-responsive" alt="Alex's Avatar" id="avatar2" src="assets/images/avatars/profile-pic.jpg" />
                        </span>

                        <div class="space space-4"></div>

                        <a href="#" class="btn btn-sm btn-block btn-success">
                            <i class="ace-icon fa fa-plus-circle bigger-120"></i>
                            <span class="bigger-110">Remove Photo</span>
                        </a>

                        <a href="#" class="btn btn-sm btn-block btn-primary">
                            <i class="ace-icon fa fa-envelope-o bigger-110"></i>
                            <span class="bigger-110">Change Photo</span>
                        </a>
                    </div>

                    <div class="col-xs-12 col-sm-9">
                        <h4 class="blue">
                            <span class="middle">Alex M. Doe</span>
                        </h4>

                        <div class="profile-user-info">

                            <div class="profile-info-row">
                                <div class="profile-info-name"> Username </div>
                                <div class="profile-info-value">
                                    <span>alexdoe</span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> Location </div>
                                <div class="profile-info-value">
                                    <i class="fa fa-map-marker light-orange bigger-110"></i>
                                    <span>Netherlands</span>
                                    <span>Amsterdam</span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> Age </div>
                                <div class="profile-info-value">
                                    <span>38</span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> Joined </div>
                                <div class="profile-info-value">
                                    <span>2010/06/20</span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-value"></div>
                            </div>

                        </div> <!-- profile-user-info -->
                    </div> <!-- col-xs-12 col-sm-9 -->

                </div> <!-- row -->
            </div> <!-- tab-pane -->
        </div> <!-- tab-content -->

    </div> <!-- tabbable -->
</div> <!-- user-profile -->

<?php include 'includes/footer.php'; ?>