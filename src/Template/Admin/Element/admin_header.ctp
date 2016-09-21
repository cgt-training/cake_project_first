<div class="container-fluid headerbackgroud admin-color">
	<div class="container">
		<div class="container-header">
			<div class="col-xs-1 col-sm-1 col-lg-1 img-responsive Headerlogo"><?php echo $this->Html->image('logo.png', array('alt' => 'CakePHP')); ?></div>
			<div class="col-xs-6 col-sm-7 col-lg-7 Header-padding"><h2 class="Header-bottom-padding">Sri Sukhmani Institute of Management</h2>
				<span>(Approved by A.I.C.T.E., Ministry of HRD, Govt. of India)</span>
			</div>
			<div class="col-sm-4 col-xs-3 col-lg-4">
				<div class="input-group HeaderSearch">
			        <input type="text" class="form-control" id="inputGroupSuccess2" aria-describedby="inputGroupSuccess2Status" placeholder="Search">
			        <div class="input-group-btn">
			            <button type="submit" class="btn btn-default">
			                <span class="glyphicon glyphicon-search"></span>
			            </button>
			        </div>
			    </div>
			</div>
		</div>
		<div class="nav-container">
			<nav class="navbar nav-baground">			
				<div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-header" aria-expanded="true">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar icon-bar-color"></span>
			        <span class="icon-bar icon-bar-color"></span>
			        <span class="icon-bar icon-bar-color"></span>
			      </button>	
			       <!-- <a class="navbar-brand" href="#"></a>      -->
			    </div>
			    <div class="collapse navbar-collapse" id="navbar-collapse-header">
				    <ul class="nav nav-justified">
				        <li class="<?php echo (!empty($this->request->params['controller']) && ($this->request->params['controller']=='Users') )?'active' :'inactive' ?>">
                            <?php echo $this->Html->link('Users', ['controller' => 'Users', 'action' => 'index'], ['class'=>'nav-menu']) ?>
                        </li>

                        <li class="<?php echo (!empty($this->request->params['controller']) && ($this->request->params['controller']=='Bookmarks') )?'active' :'inactive' ?>">
                            <?php echo $this->Html->link('Bookmarks', ['controller' => 'Bookmarks', 'action' => 'index'], ['class'=>'nav-menu']) ?>
                        </li>

                        <li class="<?php echo (!empty($this->request->params['controller']) && ($this->request->params['controller']=='Tags') )?'active' :'inactive' ?>">
                            <?php echo $this->Html->link('Tags', ['controller' => 'Tags', 'action' => 'index'],	['class'=>'nav-menu']) ?>
                        </li>

				        <?php if($this->request->session()->read('Auth.User.username')) { ?>
					        <li><a href="#" class="nav-menu">Faculty</a></li>
					        <li><a href="#" class="nav-menu">Placement</a></li>
					    <?php } ?>
				        <li><a href="#" class="nav-menu">Contact Us</a></li>
				        
				        <?php if($this->request->session()->read('Auth.User.username')) { ?>
				        <li class="nav-menu"><?php echo $this->Html->link('Logout', ['controller' => 'Users', 'action' => 'logout'],	['class'=>'nav-menu']) ?></li>
				        <?php } else { ?>
				        <li class="nav-menu"><?php echo $this->Html->link('Login', ['controller' => 'Users', 'action' => 'login'],	['class'=>'nav-menu']) ?></li>
				        <?php } ?>

				        <li>Welcome&nbsp;<?php echo (!empty($this->request->session()->read('Auth.User.username'))? $this->request->session()->read('Auth.User.username') : 'Guest' ); ?>
				        </li>
				    </ul>
				</div>
			</nav>
		</div>
	</div>

</div>	