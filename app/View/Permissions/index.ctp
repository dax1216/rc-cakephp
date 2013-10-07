<?php   echo $this->Html->css(array('jquery.treeview.css'), null, array('inline' => false)); ?>
<?php   echo $this->Html->script(array('jquery.treeview.js','jquery.treeview-async.js', 'acl'), array('inline' => false)) ?>
<div class="row">
    <div class="span6">
    <h2>Permissions</h2>
    </div>
</div>
<div class="row">
    <div class="span3">        
        <form action="/permissions/aco_sync" method="POST">
            <button class="btn btn-danger">Re-sync permissions</button>
        </form>

        <ul id="acos">

        </ul>
    </div>
    <div class="span5" id="aro-display">

    </div>
</div>


