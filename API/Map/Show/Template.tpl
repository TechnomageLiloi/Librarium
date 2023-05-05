<style>
    #map-show .title
    {
        text-align: center;
    }
</style>
<div id="map-show">
    <div class="title">
        <h1><?php echo $entity->getTitle(); ?></h1>
        <hr/>
        <?php echo $entity->getDt(); ?> - <?php echo $entity->getTags(); ?>
        <hr/>
    </div>
    <?php echo $entity->parse(); ?>
    <hr/>
    <ul>
    <?php foreach($items as $item): ?>
        <li>
            <a href="<?php echo $item->getGlobal(); ?>">
                <?php echo $item->getTitle(); ?>
            </a>
        </li>
    <?php endforeach; ?>
    </ul>
</div>