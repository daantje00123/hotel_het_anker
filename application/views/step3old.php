<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <form action="<?php echo base_url('reservering/step3old/?van='.$van.'&tot='.$tot.'&type='.$type.'&kamer='.$kamer); ?>" method="post">
                <div class="row form-group">
                    <label class="form-control-label col-xs-12 col-md-2" for="klant">Klant</label>
                    <div class="col-xs-12 col-md-4">
                        <select id="klant" name="klant" class="form-control">
                            <?php if (!isset($klanten) || empty($klanten)): ?>
                                <option value="0">Er zijn nog geen klanten</option>
                            <?php else: ?>
                                <?php foreach($klanten as $klant): ?>
                                    <option value="<?php echo $klant['id_klant']; ?>" <?php echo set_select('klant', $klant['id_klant']); ?>><?php echo $klant['voornaam'].(!empty($klant['tussenvoegsel']) ? ' '.$klant['tussenvoegsel'] : '').' '.$klant['achternaam']; ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12 offset-md-2 col-md-4">
                        <a href="<?php echo base_url('reservering/step3/?van='.$van.'&tot='.$tot.'&type='.$type.'&kamer='.$kamer); ?>" class="btn btn-outline-secondary btn-arrow-left">Terug</a>
                        <button type="submit" class="btn btn-outline-primary btn-arrow-right">Verder</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>