<div class="container-fluid">
    <?php echo validation_errors('<div class="row"><div class="col-xs-12"><div class="alert alert-danger">','</div></div></div>'); ?>

    <div class="row">
        <div class="col-xs-12">
            <form action="<?php echo base_url('reservering/step3new/?van='.$van.'&tot='.$tot.'&type='.$type.'&kamer='.$kamer); ?>" method="post">
                <div class="row form-group">
                    <label class="form-control-label col-xs-12 col-md-2" for="voornaam">Voornaam</label>
                    <div class="col-xs-12 col-md-4">
                        <input type="text" name="voornaam" id="voornaam" class="form-control" placeholder="Voornaam" />
                    </div>
                </div>
                <div class="row form-group">
                    <label class="form-control-label col-xs-12 col-md-2" for="tussenvoegsel">Tussenvoegsel</label>
                    <div class="col-xs-12 col-md-4">
                        <input type="text" name="tussenvoegsel" id="tussenvoegsel" class="form-control" placeholder="Tussenvoegsel" />
                    </div>
                </div>
                <div class="row form-group">
                    <label class="form-control-label col-xs-12 col-md-2" for="achternaam">Achternaam</label>
                    <div class="col-xs-12 col-md-4">
                        <input type="text" name="achternaam" id="achternaam" class="form-control" placeholder="Achternaam" />
                    </div>
                </div>
                <div class="row form-group">
                    <label class="form-control-label col-xs-12 col-md-2" for="email">E-mailadres</label>
                    <div class="col-xs-12 col-md-4">
                        <input type="email" name="email" id="email" class="form-control" placeholder="E-mailadres" />
                    </div>
                </div>
                <div class="row form-group">
                    <label class="form-control-label col-xs-12 col-md-2" for="straat">Straat</label>
                    <div class="col-xs-12 col-md-4">
                        <input type="text" name="straat" id="straat" class="form-control" placeholder="Straat" />
                    </div>
                </div>
                <div class="row form-group">
                    <label class="form-control-label col-xs-12 col-md-2" for="huisnummer">Huisnummer</label>
                    <div class="col-xs-12 col-md-4">
                        <input type="text" name="huisnummer" id="huisnummer" class="form-control" placeholder="Huisnummer" />
                    </div>
                </div>
                <div class="row form-group">
                    <label class="form-control-label col-xs-12 col-md-2" for="woonplaats">Woonplaats</label>
                    <div class="col-xs-12 col-md-4">
                        <input type="text" name="woonplaats" id="woonplaats" class="form-control" placeholder="Woonplaats" />
                    </div>
                </div>
                <div class="row form-group">
                    <label class="form-control-label col-xs-12 col-md-2" for="postcode">Postcode</label>
                    <div class="col-xs-12 col-md-4">
                        <input type="text" name="postcode" id="postcode" class="form-control" placeholder="Postcode" />
                    </div>
                </div>
                <div class="row form-group">
                    <label class="form-control-label col-xs-12 col-md-2" for="telefoon">Telefoon</label>
                    <div class="col-xs-12 col-md-4">
                        <input type="text" name="telefoon" id="telefoon" class="form-control" placeholder="Telefoon" />
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

<script>
    window.addEventListener('DOMContentLoaded', function() {
        $('#postcode').formatter({
            'pattern': '{{9999aa}}'
        });

        $('#telefoon').formatter({
            'pattern': '0{{999999999}}',
            'persistent': true
        });
    })
</script>