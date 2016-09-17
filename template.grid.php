<input class="[ js-selector-storage ]" type="hidden" name="<?= $field->name() ?>" id="<?= $field->name() ?>" value="<?= implode(',', $field->value()) ?>" />

<?php if ($field->files()->count() > 0): ?>
    <div class="input input-with-items">

        <?php foreach ($field->files() as $file): ?>
            <div id="<?= $field->itemId($file) ?>" class="item item-with-image [ selector-item js-selector-item ]" data-file="<?= $file->filename() ?>" <?= r($field->isInValue($file), 'data-checked="true"') ?> >
                <a class="btn btn-with-icon btn-selector-wrapper [ selector-checkbox js-selector-checkbox ]" href="#" title="<?= l::get('selector.select') ?>">
                    <div class="item-content">
                        <?php if ($file->type() == 'image'): ?>
                            <figure class="item-image">
                                <?= thumb($file, array('width' => $field->thumbSize(), 'height' => $field->thumbSize(), 'crop' => true)) ?>
                            </figure>
                        <?php else: ?>
                            <figure class="item-image item-filetype">
                                <?= strtoupper($file->extension()) ?>
                            </figure>
                        <?php endif ?>
                        <div class="item-info">
                            <ul class="item-options-column">
                                <li>
                                    <a class="btn btn-with-icon [ selector-checkbox js-selector-checkbox ]" href="#" title="<?= l::get('selector.select') ?>">
                                        <i class="icon icon-left fa fa-circle-o"></i>
                                    </a>
                                </li>
                                <li>
                                    <?php if (version_compare(panel()->version(), '2.2', '>=')): ?>
                                        <a class="btn btn-with-icon" data-context="<?= purl($file, 'context') ?>" href="#options" title="<?= l('selector.options') ?>">
                                            <i class="icon icon-left fa fa-pencil"></i>
                                        </a>
                                    <?php else: ?>
                                        <a class="btn btn-with-icon" href="<?= purl($file, 'show') ?>" title="<?= l('selector.options') ?>">
                                            <i class="icon icon-left fa fa-pencil"></i>
                                        </a>
                                    <?php endif ?>
                                </li>
                            </ul>
                            <div class="item-info-text">
                                <strong class="item-title">
                                    <?= $file->filename() ?>
                                </strong>
                                <small class="item-meta marginalia">
                                    <?= $file->type() ?> / <?= $file->niceSize() ?>
                                    <?php if (($file->type() == 'image') and ($file->extension() != 'svg')): ?>
                                        <br><?= $file->width() ?> x <?= $file->height() ?>
                                    <?php endif ?>
                                </small>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach ?>

    </div>
<?php else: ?>
    <div class="field field-is-readonly field-with-icon">
        <div class="field-content">
            <input class="input input-is-readonly" type="text" readonly placeholder="" value="<?= l::get('selector.empty', 'No matching files yet.') ?>">
            <div class="field-icon">
                <i class="icon fa fa-info"></i>
            </div>
        </div>
    </div>
<?php endif ?>
