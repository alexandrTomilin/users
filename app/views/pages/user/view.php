<section class="views">
    <form action="" method="post">
        <input type="radio" name="views" class="views-radio" id="html" checked />
        <label for="html">html</label>

        <input type="radio" name="views" class="views-radio" id="json" />
        <label for="json">json</label>

        <input type="radio" name="views" class="views-radio" id="xml" />
        <label for="xml">xml</label>
    </form>
</section>


<section class="view">
    <table id="table_id" class="display">

        <thead>
        <tr>
            <th>№</th>
            <th>Имя</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($users as $key => $value):?>
            <tr>
                <td><?php echo $key += 1;?></td>
                <td><?php echo $value['name'];?></td>
            </tr>
        <?php endforeach;?>
        </tbody>

    </table>
</section>
