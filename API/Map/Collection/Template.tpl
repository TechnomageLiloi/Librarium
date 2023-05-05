<style>
    #map-collection .block-area
    {
        border: gray 1px solid;
        border-radius: 5px;
        padding: 5px;
        width: 80%;
        margin: 5px auto;
        text-align: center;
    }

    #map-collection .block-area h1.title
    {
        text-align: center;
    }
</style>
<div id="map-collection">
    <?php foreach($collection as $key_area => $entity): ?>
        <div class="block-area">
            <h1 class="title">
                <a href="<?php echo $entity->getKey(); ?>">
                    <?php echo $entity->getTitle(); ?>
                </a>
            </h1>
            <hr/>
            <?php //echo $entity->parse(); ?>
        </div>
    <?php endforeach; ?>
</div>