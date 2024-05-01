<style>
    p{
        font-size:16px;
    }
    h2{
        font-size:18px;
    }
</style>
<?php $arr = array('i' => array(), 'a' => array('href' => array(), 'target' => array()));?>
<div class="config-bloc-aff">
    <?php if (isset($configLWS['apikey'])) : ?>
        <p>
            <?php esc_html_e('On this page, you will find your 25 last commissions.', 'lws-affiliation'); ?> </br>
            <?php esc_html_e('There is a 45 days delay between the moment a commission is registered and the moment it is accepted: ', 'lws-affiliation'); ?> <br>
            <?php esc_html_e('We must make sure the commission is verified and the customer is not planning to get refunded.', 'lws-affiliation'); ?>
        </p>
        <table id="commission_list" class="styled-table-aff nowrap" style="max-width:100%">
            <thead>
                <tr style="text-align-last:center">
                    <th class="aff_history_tab aff_tabhead">
                        <?php esc_html_e("Product", "lws-affiliation");?>
                    </th>
                    <th class="aff_history_tab">
                        <?php esc_html_e("Commission (Euro)", "lws-affiliation");?>
                    </th>
                    <th class="aff_history_tab">
                        <?php esc_html_e("Status", "lws-affiliation");?>
                    </th>
                    <th class="aff_history_tab">
                        <?php esc_html_e("Sale Done At", "lws-affiliation");?>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($last_sales as $commission) :?>
                <tr>
                    <td class="aff_history_tab_content aff_tabcontent">
                        <?php echo esc_html( $commission['commissions']['product'] ); ?>
                    </td>
                    <td class="aff_history_tab_content">
                        <?php echo esc_html( $commission['commissions']['commission'] . "€" ); ?>
                    </td>
                    <td class="aff_history_tab_content">
                        <?php if ($commission['commissions']['status'] == 0) : ?>
                            <span class="await_approval"><?php echo esc_html_e( 'Awaiting approval', 'lws-affiliation' ); ?></span>
                        <?php elseif ($commission['commissions']['status'] == 1) : ?>
                            <span class="accepted"><?php echo esc_html_e( 'Accepted', 'lws-affiliation' ); ?></span>
                        <?php elseif ($commission['commissions']['status'] == 2) : ?>
                            <span class="refused"><?php echo esc_html_e( 'Refused', 'lws-affiliation' ); ?></span>
                        <?php endif ?>
                    </td>
                    <td class="aff_history_tab_content">
                        <?php echo esc_html( explode(' ', $commission['commissions']['created'])[0] ); ?>
                    </td>
                </tr>
                    <?php endforeach ?>
            </tbody>
        </table>
    <?php endif ?>
</div>

<script>
    jQuery(document).ready(function() {
    var table = jQuery('#commission_list').DataTable( {
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        "order": [[ 0, "desc" ]],
        responsive: true,
        order: [[3, 'desc']],
        lengthMenu: [
            [5, 10, 25],
            [5, 10, 25],
        ],
     <?php if(get_locale() == 'fr_FR') : ?>
        language: {
            url: "<?php echo (esc_url( plugin_dir_url( dirname(__DIR__) ) . 'languages/fr-FR.json'))?>"
        }
    <?php endif ?>
    } );
} );
</script>
