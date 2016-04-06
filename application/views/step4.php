<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <h3>Gegevens controleren</h3>
            <form action="<?php echo base_url('reservering/step4/?van='.$van.'&tot='.$tot.'&type='.$type->get_id_kamer_type().'&kamer='.$kamer['id_kamer'].'&klant='.$klant['id_klant']); ?>" method="post">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <td>Voornaam</td>
                        <td><?php echo $klant['voornaam']; ?></td>
                    </tr>
                    <?php if(!empty($klant['tussenvoegsel'])): ?>
                        <tr>
                            <td>Tussenvoegsel</td>
                            <td><?php echo $klant['tussenvoegsel']; ?></td>
                        </tr>
                    <?php endif; ?>
                    <tr>
                        <td>Achternaam</td>
                        <td><?php echo $klant['achternaam']; ?></td>
                    </tr>
                    <tr>
                        <td>E-mailadres</td>
                        <td><?php echo $klant['email']; ?></td>
                    </tr>
                    <tr>
                        <td>Straat</td>
                        <td><?php echo $klant['straat']; ?></td>
                    </tr>
                    <tr>
                        <td>Huisnummer</td>
                        <td><?php echo $klant['huisnummer']; ?></td>
                    </tr>
                    <tr>
                        <td>Woonplaats</td>
                        <td><?php echo $klant['woonplaats']; ?></td>
                    </tr>
                    <tr>
                        <td>Postcode</td>
                        <td><?php echo $klant['postcode']; ?></td>
                    </tr>
                    <tr>
                        <td>Telefoonnummer</td>
                        <td><?php echo $klant['telefoon']; ?></td>
                    </tr>
                    <tr>
                        <td>Type kamer</td>
                        <td><?php echo $type->get_naam(); ?></td>
                    </tr>
                    <tr>
                        <td>Kamer</td>
                        <td><?php echo $kamer['naam']; ?></td>
                    </tr>
                    <tr>
                        <td>Prijs</td>
                        <td>&euro;<?php echo number_format($kamer['prijs'], 2,',','.'); ?></td>
                    </tr>
                    <tr>
                        <td>Aantal personen</td>
                        <td><?php echo $kamer['personen']; ?></td>
                    </tr>
                    </tbody>
                </table>
                <div class="row form-group">
                    <div class="col-xs-12">
                        <a href="<?php echo base_url('reservering/step3/?van='.$van.'&tot='.$tot.'&type='.$type->get_id_kamer_type().'&kamer='.$kamer['id_kamer']); ?>" class="btn btn-outline-secondary btn-arrow-left">Terug</a>
                        <button type="submit" class="btn btn-outline-warning btn-arrow-left" value="cancel" name="confirm">Annuleren</button>
                        <button type="submit" class="btn btn-outline-primary btn-arrow-right" value="confirm" name="confirm">Bevestigen</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>