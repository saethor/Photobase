<footer class="text-center">
    <p>
        &copy;
        <?php
        $startYear = 2012;
        $thisYear = date('Y');
        echo ($startYear == $thisYear) ? $startYear : "{$startYear} &ndash; {$thisYear}";
        ?>
    </p>
</footer>
