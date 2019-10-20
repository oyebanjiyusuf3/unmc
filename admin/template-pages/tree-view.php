<link href="<?php echo ADMIN_URL;?>/assets/plugins/jstree/style.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo ADMIN_URL;?>/assets/plugins/jstree/jstree.min.js"></script>

<script>
$( document ).ready(function() {
    // Basic
    $('#simpleTree').jstree({
		'core' : {
			'themes' : {
				'responsive': false
			}
		},
        'types' : {
            'default' : {
                'icon' : 'fa fa-folder-open'
            },
            'file' : {
                'icon' : 'fa fa-file'
            }
        },
        'plugins' : ['types']
    });
    
    // Checkbox
    $('#checkboxesTree').jstree({
		'core' : {
			'themes' : {
				'responsive': false
			}
		},
        'types' : {
            'default' : {
                'icon' : 'fa fa-folder'
            },
            'file' : {
                'icon' : 'fa fa-file'
            }
        },
        'plugins' : ['types', 'checkbox']
    });
    
    // Drag & Drop
    $('#dragdropTree').jstree({
		'core' : {
			'check_callback' : true,
			'themes' : {
				'responsive': false
			}
		},
        'types' : {
            'default' : {
                'icon' : 'fa fa-folder'
            },
            'file' : {
                'icon' : 'fa fa-file'
            }
        },
        'plugins' : ['types', 'dnd']
    });
    
});
</script>

			<div class="row">
					<div class="col-xl-12">
							<div class="breadcrumb-holder">
                                    <h1 class="main-title float-left">Tree View</h1>
                                    <ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Home</li>
										<li class="breadcrumb-item active">Tree View</li>
                                    </ol>
                                    <div class="clearfix"></div>
                            </div>
					</div>
			</div>
            <!-- end row -->
			
			
			<div class="row">
			
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-folder-open-o"></i> Simple Tree View</h3>
							</div>
								
							<div class="card-body">
																
								
								
								<div id="simpleTree">
                                        <ul>
                                            <li>Admin
                                                <ul>
                                                    <li data-jstree='{"opened":true}'>Settings
                                                        <ul>
                                                            <li data-jstree='{"type":"file"}'>Website settings</li>
                                                            <li data-jstree='{"opened":true}'>Users settings
                                                                <ul>
                                                                    <li data-jstree='{"selected":true,"type":"file"}'>Users Accounts</li>
                                                                    <li data-jstree='{"type":"file"}'>Users Groups</li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li data-jstree='{"opened":true}'>Newsletters
                                                        <ul>
                                                            <li data-jstree='{"type":"file"}'>Newsletter one</li>
                                                            <li data-jstree='{"type":"file"}'>Newsletter two</li>
															<li data-jstree='{"type":"file"}'>Newsletter three</li>
                                                        </ul>
                                                    </li>
                                                    <li data-jstree='{"icon":"fa fa-folder-open"}'>Comments</li>
                                                    <li data-jstree='{"opened":true}'>Plugins
                                                        <ul>
                                                            <li data-jstree='{"type":"file"}'>Plugin one</li>
                                                            <li data-jstree='{"type":"file"}'>Plugin two</li>
                                                        </ul>
                                                    </li>
                                                    <li data-jstree='{"icon":"fa fa-user"}'>Users</li>
                                                </ul>
                                            </li>
                                            <li data-jstree='{"type":"file"}'>Modules</li>
                                        </ul>
                                    </div>
								
								
							</div>														
						</div><!-- end card-->					
                    </div>

					
					
					
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-folder-open-o"></i> Tree View with Checkboxes</h3>
							</div>
								
							<div class="card-body">
																
								
								
								<div id="checkboxesTree">
                                        <ul>
                                            <li>Admin
                                                <ul>
                                                    <li data-jstree='{"opened":true}'>Settings
                                                        <ul>
                                                            <li data-jstree='{"type":"file"}'>Website settings</li>
                                                            <li data-jstree='{"opened":true}'>Users settings
                                                                <ul>
                                                                    <li data-jstree='{"selected":true,"type":"file"}'>Users Accounts</li>
                                                                    <li data-jstree='{"type":"file"}'>Users Groups</li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li data-jstree='{"opened":true}'>Newsletters
                                                        <ul>
                                                            <li data-jstree='{"type":"file"}'>Newsletter one</li>
                                                            <li data-jstree='{"type":"file"}'>Newsletter two</li>
															<li data-jstree='{"type":"file"}'>Newsletter three</li>
                                                        </ul>
                                                    </li>
                                                    <li data-jstree='{"icon":"fa fa-folder-open"}'>Comments</li>
                                                    <li data-jstree='{"opened":true}'>Plugins
                                                        <ul>
                                                            <li data-jstree='{"type":"file"}'>Plugin one</li>
                                                            <li data-jstree='{"type":"file"}'>Plugin two</li>
                                                        </ul>
                                                    </li>
                                                    <li data-jstree='{"icon":"fa fa-user"}'>Users</li>
                                                </ul>
                                            </li>
                                            <li data-jstree='{"type":"file"}'>Modules</li>
                                        </ul>
                                    </div>
								
								
							</div>														
						</div><!-- end card-->					
                    </div>
					
					
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-folder-open-o"></i> Tree View with drag & drop</h3>
							</div>
								
							<div class="card-body">
																
								
								
								<div id="dragdropTree">
                                        <ul>
                                            <li>Admin
                                                <ul>
                                                    <li data-jstree='{"opened":true}'>Settings
                                                        <ul>
                                                            <li data-jstree='{"type":"file"}'>Website settings</li>
                                                            <li data-jstree='{"opened":true}'>Users settings
                                                                <ul>
                                                                    <li data-jstree='{"selected":true,"type":"file"}'>Users Accounts</li>
                                                                    <li data-jstree='{"type":"file"}'>Users Groups</li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li data-jstree='{"opened":true}'>Newsletters
                                                        <ul>
                                                            <li data-jstree='{"type":"file"}'>Newsletter one</li>
                                                            <li data-jstree='{"type":"file"}'>Newsletter two</li>
															<li data-jstree='{"type":"file"}'>Newsletter three</li>
                                                        </ul>
                                                    </li>
                                                    <li data-jstree='{"icon":"fa fa-folder-open"}'>Comments</li>
                                                    <li data-jstree='{"opened":true}'>Plugins
                                                        <ul>
                                                            <li data-jstree='{"type":"file"}'>Plugin one</li>
                                                            <li data-jstree='{"type":"file"}'>Plugin two</li>
                                                        </ul>
                                                    </li>
                                                    <li data-jstree='{"icon":"fa fa-user"}'>Users</li>
                                                </ul>
                                            </li>
                                            <li data-jstree='{"type":"file"}'>Modules</li>
                                        </ul>
                                    </div>
								
								
							</div>														
						</div><!-- end card-->					
                    </div>
					
			</div>


			
			<div class="alert alert-success" role="alert">
					  <h4 class="alert-heading">Documentation</h4>
					  <p>You can find examples and documentation about Tree Plugin here: <a target="_blank" href="https://www.jstree.com/">jsTree</a></p>
			</div>			