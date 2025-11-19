<?php if(isMobile()): ?>
    <div id="mySidenav" class="sidenav hide">
        <div class="sidenav-header">
            <a href="javascript:void(0)" class="closebtn sidenavmenuOpenClose">
                <img src="images/ikony/zamknij.png" alt="zamknij">
            </a>
        </div>
        <div class="sidenav-container">
            <jdoc:include type="modules" name="menu" style="none" />
            <div class="social">
                <jdoc:include type="modules" name="header-top" style="none" />
            </div>
        </div>
    </div> 
<?php endif; ?>