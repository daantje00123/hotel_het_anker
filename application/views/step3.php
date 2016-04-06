<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <form action="<?php echo base_url('reservering/step3/?van='.$van.'&tot='.$tot.'&type='.$type.'&kamer='.$kamer); ?>" method="post">
                <div class="row">
                    <div class="col-xs-6">
                        <h2>Bestaande klant</h2>
                        <p>Klik op de onderstaande knop als de klant al eerder heeft gereserveerd.</p>
                    </div>
                    <div class="col-xs-6">
                        <h2>Nieuwe klant</h2>
                        <p>Klik op de onderstaande knop als het een nieuwe klant is.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <a href="<?php echo base_url('reservering/step2/?van='.$van.'&tot='.$tot.'&type='.$type); ?>" class="btn btn-outline-secondary btn-arrow-left">Terug</a>
                        <button type="submit" name="action" value="old" class="btn btn-outline-primary btn-arrow-right">Bestaande klant</button>
                    </div>
                    <div class="col-xs-6">
                        <a href="<?php echo base_url('reservering/step2/?van='.$van.'&tot='.$tot.'&type='.$type); ?>" class="btn btn-outline-secondary btn-arrow-left">Terug</a>
                        <button type="submit" name="action" value="new" class="btn btn-outline-primary btn-arrow-right">Nieuwe klant</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>