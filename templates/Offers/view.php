<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Offer $offer
 */
?>
<div class="row">

    <div class="column-responsive column-80">
        <div class="offers view content">
            <h3><?= h($offer->offer_no) ?></h3>
            <table>
                <tr>
                    <th><?= __('Dept No') ?></th>
                    <td><?= h($offer->dept_no) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($offer->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Offer No') ?></th>
                    <td><?= $this->Number->format($offer->offer_no) ?></td>
                </tr>
                <tr>
                    <th><?= __('Title No') ?></th>
                    <td><?= $this->Number->format($offer->title_no) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
