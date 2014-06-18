<?php
// Only admins are allowed to visit this page
if (AuthComponent::user('role') != "admin" && AuthComponent::user('role') != "author") {
    throw new UnauthorizedException(__('Not allowed to access this page'));
}
?>
<div class="box users form cms cmsIndex">
    <?php echo $this->Session->flash(); ?>
    <legend class="legend">
        <?php
        if (AuthComponent::user('role') == "admin") {
            ?>
            <h1>Admin Control Panel</h1>

            <?php
        } elseif (AuthComponent::user('role') == "author") {
            ?>
            <h1>Author Control Panel</h1>
            <?php
        }
        ?>

    </legend>
    <ul class="adminLinks">
        <li><a href="/albums/cms">Albums</a></li>
        <li><a href="/articles/cms">Articles</a></li>
        <?php
        if (AuthComponent::user('role') == "admin") {
            ?>
            <li><a href="/events/cms">Events</a></li>
            <li><a href="/orders/cms">Orders</a></li>
            <li><a href="/products/cms">Products</a></li>
            <li><a href="/racers/cms">Racers</a></li>
            <li><a href="/results/cms">Results</a></li>
            <li><a href="/users/cms">Users</a></li>
            <?php
        }
        ?>
    </ul>
</div>