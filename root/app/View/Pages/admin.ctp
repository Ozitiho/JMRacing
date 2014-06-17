<?php
// Only admins are allowed to visit this page
if (AuthComponent::user('role') != "admin") {
    throw new UnauthorizedException(__('Not allowed to access this page'));
}
?>
<div class="box users form cms cmsIndex">
    <?php echo $this->Session->flash(); ?>
    <legend class="legend">
        <h1>Admin Control Panel</h1>
    </legend>
    <ul class="adminLinks">
        <li><a href="/albums/cms">Albums</a></li>
        <li><a href="/articles/cms">Articles</a></li>
        <li><a href="/events/cms">Events</a></li>
        <li><a href="/products/cms">Products</a></li>
        <li><a href="/racers/cms">Racers</a></li>
        <li><a href="/results/cms">Results</a></li>
        <li><a href="/users/cms">Users</a></li>
    </ul>
</div>