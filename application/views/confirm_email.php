Geachte heer/mevrouw <?php echo $klant['voornaam'].(!empty($klant['tussenvoegsel']) ? ' '.$klant['tussenvoegsel'] : '').' '.$klant['achternaam']; ?>,

Hierbij bevestigen wij uw reservering. Hieronder staan de gegevens die wij hebben genoteerd:

Voornaam: <?php echo $klant['voornaam'].PHP_EOL; ?>
<?php if (!empty($klant['tussenvoegsel'])): ?>Tussenvoegsel: <?php echo $klant['tussenvoegsel'].PHP_EOL; ?><?php endif; ?>
Achternaam: <?php echo $klant['achternaam'].PHP_EOL; ?>
E-mailadres: <?php echo $klant['email'].PHP_EOL; ?>
Straat: <?php echo $klant['straat'].PHP_EOL; ?>
Huisnummer: <?php echo $klant['huisnummer'].PHP_EOL; ?>
Woonplaats: <?php echo $klant['woonplaats'].PHP_EOL; ?>
Postcode: <?php echo $klant['postcode'].PHP_EOL; ?>
Telefoonnummer: <?php echo $klant['telefoon'].PHP_EOL; ?>
Kamer type: <?php echo $type->get_naam().PHP_EOL; ?>
Kamer: <?php echo $kamer['naam'].PHP_EOL; ?>
Prijs: €<?php echo number_format($kamer['prijs'],2,',','.').PHP_EOL; ?>
Aantal personen: <?php echo $kamer['personen'].PHP_EOL; ?>
Van: <?php echo $van.PHP_EOL; ?>
Tot: <?php echo $tot.PHP_EOL; ?>

Met vriendelijke groet,

Hotel Het Anker
