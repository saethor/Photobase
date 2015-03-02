<footer class="text-center">
    <p>
        &copy;Sæþór Hallgrímsson
        <?php
        $startYear = 2015;
        $thisYear = date('Y');
        echo ($startYear == $thisYear) ? $startYear : "{$startYear} &ndash; {$thisYear}";
        ?>
    </p>
</footer>
