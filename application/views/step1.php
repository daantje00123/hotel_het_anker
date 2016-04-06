<div class="container-fluid">
    <?php echo validation_errors('<div class="row"><div class="col-xs-12"><div class="alert alert-danger">','</div></div></div>'); ?>

    <div class="row">
        <div class="col-xs-12">
            <form action="<?php echo base_url(); ?>" method="post">
                <div class="row form-group">
                    <label class="form-control-label col-xs-12 col-md-2" for="van">Van</label>
                    <div class="col-xs-12 col-md-4">
                        <input type="text" name="van" id="van" value="<?php echo set_value('van', date('d-m-Y')); ?>" placeholder="Van" class="form-control datepicker" />
                    </div>
                </div>
                <div class="row form-group">
                    <label class="form-control-label col-xs-12 col-md-2" for="tot">Tot</label>
                    <div class="col-xs-12 col-md-4">
                        <input type="text" name="tot" id="tot" value="<?php echo set_value('tot'); ?>" placeholder="Tot" class="form-control datepicker" />
                    </div>
                </div>
                <div class="row form-group">
                    <label class="form-control-label col-xs-12 col-md-2" for="type">Type</label>
                    <div class="col-xs-12 col-md-4">
                        <select name="type" id="type" class="form-control">
                            <?php if (isset($types) && !empty($types)): ?>
                                <?php foreach($types as $type): ?>
                                    <option value="<?php echo $type->get_id_kamer_type(); ?>" <?php echo set_select('type', $type->get_id_kamer_type()); ?>><?php echo $type->get_naam(); ?></option>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <option value="0">Er zijn nog geen kamer types.</option>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12 offset-md-2 col-md-4">
                        <button type="submit" class="btn btn-outline-primary btn-arrow-right">Zoek</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>