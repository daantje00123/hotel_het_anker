<div class="container-fluid">
    <?php echo validation_errors('<div class="row"><div class="col-xs-12"><div class="alert alert-danger">','</div></div></div>'); ?>

    <div class="row">
        <div class="col-xs-12">
            <form action="<?php echo base_url('reservering/step2/?van='.$van.'&tot='.$tot.'&type='.$type); ?>" method="post">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Naam</th>
                        <th>Aantal personen</th>
                        <th>Prijs</th>
                        <th>Type</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (isset($lege_kamers) && !empty($lege_kamers)): ?>
                        <?php foreach($lege_kamers as $kamer): ?>
                            <tr>
                                <td><input type="radio" name="kamer" value="<?php echo $kamer['id_kamer']; ?>" /></td>
                                <td><?php echo $kamer['naam']; ?></td>
                                <td><?php echo $kamer['personen']; ?></td>
                                <td>&euro;<?php echo number_format($kamer['prijs'], 2, ',','.'); ?></td>
                                <td><?php echo $kamer['type']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5">Er zijn geen kamers beschikbaar... <a href="<?php echo base_url('reservering'); ?>">Opnieuw beginnen</a></td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
                <a href="<?php echo base_url('reservering'); ?>" class="btn btn-outline-secondary btn-arrow-left">Terug</a>
                <button type="submit" class="btn btn-outline-primary btn-arrow-right">Verder</button>
            </form>
        </div>
    </div>
</div>