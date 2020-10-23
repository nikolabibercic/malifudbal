
<br>
<div class="container">
    <div class="row">
        <div class="col-3">
        </div>

        <div class="col-6 text-center">
            <p class="font-weight-bold text-left display-4">Spisak ekipa</p>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ekipa</th>
                        <th scope="col">Kotizacija</th>
                        <th scope="col">Turnir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $result = $team->selectAllTeamsRegistrationPaid();
                        $count = 1;
                        foreach($result as $x): 
                    ?>
                        <tr>
                            <th scope="row"><?php echo $count; $count = $count + 1; ?></th>
                            <td><?php echo $x->Ekipa; ?></td>
                            <td><?php echo $x->Kotizacija; ?></td>
                            <td><?php echo $x->Turnir; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="col-3">
        </div>
    </div>
</div>