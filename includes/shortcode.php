<?php

function ptp_render_pricing_table() {
    ob_start();

    // Get admin data
    $rows = get_option('ptp_table_rows', []);

    ?>

<section class="pricing-table">
  <h2>Choose Your <span>Account</span></h2>

  <div class="phases">
    <button class="phase active">One phase <span>1-Phase</span></button>
    <button class="phase">Regular <span>2-Phase</span></button>
    <button class="phase">Swing <span>2-Phase</span></button>
  </div>

  <div class="bor">
    <div class="amounts">
      <button>$5k</button>
      <button>$10k</button>
      <button>$25k</button>
      <button>$50k</button>
      <button class="active">$100k</button>
      <button>$150k</button>
      <button>$200k</button>
    </div>

    <div class="table-wrapper">
      <table>
        <thead>
          <tr>
            <th>Challenge Condition</th>
            <th>Phase 1</th>
            <th>Phase 2</th>
            <th>Funded Account</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($rows)) : ?>
            <?php foreach ($rows as $row) : ?>
              <tr>
                <td>
                  <?php echo esc_html($row['label']); ?>
                  <?php if (!empty($row['subtext'])) : ?>
                    <p class="subtext"><?php echo esc_html($row['subtext']); ?></p>
                  <?php endif; ?>
                </td>
                <td><?php echo esc_html($row['phase1']); ?></td>
                <td><?php echo esc_html($row['phase2']); ?></td>
                <td><?php echo esc_html($row['funded']); ?></td>
              </tr>
            <?php endforeach; ?>
          <?php else : ?>
            <tr><td colspan="4">No data found</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    <div class="action1">
      <i class="arrow-animate"></i>
      <button class="show-more">Show More Conditions</button>
      <i class="arrow-animate"></i>
    </div>
    <div class="action2">
      <button class="cta">Buy $100k One phase Challenge</button>
    </div>
  </div>
</section>

    <?php

    return ob_get_clean();
}

add_shortcode('pricing_table', 'ptp_render_pricing_table');
