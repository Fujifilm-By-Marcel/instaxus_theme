<?php


    if ( ! class_exists( 'Redux' ) ) {
        return;
    }
 
    // This is your option name where all the Redux data is stored.
    $opt_name = "logancee_options";
    
    $skins = array();
   
    $logancee_skins_config = json_decode(get_option('logancee_skins_config'), true);

    if($logancee_skins_config){

        foreach($logancee_skins_config['skins'] as $skin => $skin_options){
            $skins[$skin] = $skin;
        }
    } 
    
    
    $patterns = array(
        '45degreee_fabric.png' => '/img/subtle_patterns/45degreee_fabric.png',
        '60degree_gray.png' => '/img/subtle_patterns/60degree_gray.png',
        'absurdidad.png' => '/img/subtle_patterns/absurdidad.png',
        'agsquare.png' => '/img/subtle_patterns/agsquare.png',
        'always_grey.png' => '/img/subtle_patterns/always_grey.png',
        'arab_tile.png' => '/img/subtle_patterns/arab_tile.png',
        'arches.png' => '/img/subtle_patterns/arches.png',
        'argyle.png' => '/img/subtle_patterns/argyle.png',
        'asfalt.png' => '/img/subtle_patterns/asfalt.png',
        'assault.png' => '/img/subtle_patterns/assault.png',
        'az_subtle.png' => '/img/subtle_patterns/az_subtle.png',
        'back_pattern.png' => '/img/subtle_patterns/back_pattern.png',
        'batthern.png' => '/img/subtle_patterns/batthern.png',
        'bedge_grunge.png' => '/img/subtle_patterns/bedge_grunge.png',
        'beige_paper.png' => '/img/subtle_patterns/beige_paper.png',
        'bgnoise_lg.png' => '/img/subtle_patterns/bgnoise_lg.png',
        'billie_holiday.png' => '/img/subtle_patterns/billie_holiday.png',
        'binding_dark.png' => '/img/subtle_patterns/binding_dark.png',
        'binding_light.png' => '/img/subtle_patterns/binding_light.png',
        'black-Linen.png' => '/img/subtle_patterns/black-Linen.png',
        'black_denim.png' => '/img/subtle_patterns/black_denim.png',
        'black_linen_v2.png' => '/img/subtle_patterns/black_linen_v2.png',
        'black_lozenge.png' => '/img/subtle_patterns/black_lozenge.png',
        'black_mamba.png' => '/img/subtle_patterns/black_mamba.png',
        'black_paper.png' => '/img/subtle_patterns/black_paper.png',
        'black_scales.png' => '/img/subtle_patterns/black_scales.png',
        'black_thread.png' => '/img/subtle_patterns/black_thread.png',
        'black_twill.png' => '/img/subtle_patterns/black_twill.png',
        'blackmamba.png' => '/img/subtle_patterns/blackmamba.png',
        'blackorchid.png' => '/img/subtle_patterns/blackorchid.png',
        'blizzard.png' => '/img/subtle_patterns/blizzard.png',
        'blu_stripes.png' => '/img/subtle_patterns/blu_stripes.png',
        'bo_play_pattern.png' => '/img/subtle_patterns/bo_play_pattern.png',
        'brickwall.png' => '/img/subtle_patterns/brickwall.png',
        'bright_squares.png' => '/img/subtle_patterns/bright_squares.png',
        'brillant.png' => '/img/subtle_patterns/brillant.png',
        'broken_noise.png' => '/img/subtle_patterns/broken_noise.png',
        'brushed_alu.png' => '/img/subtle_patterns/brushed_alu.png',
        'brushed_alu_dark.png' => '/img/subtle_patterns/brushed_alu_dark.png',
        'burried.png' => '/img/subtle_patterns/burried.png',
        'candyhole.png' => '/img/subtle_patterns/candyhole.png',
        'carbon_fibre.png' => '/img/subtle_patterns/carbon_fibre.png',
        'carbon_fibre_big.png' => '/img/subtle_patterns/carbon_fibre_big.png',
        'carbon_fibre_v2.png' => '/img/subtle_patterns/carbon_fibre_v2.png',
        'cardboard.png' => '/img/subtle_patterns/cardboard.png',
        'cardboard_1.png' => '/img/subtle_patterns/cardboard_1.png',
        'cardboard_flat.png' => '/img/subtle_patterns/cardboard_flat.png',
        'cartographer.png' => '/img/subtle_patterns/cartographer.png',
        'checkered_pattern.png' => '/img/subtle_patterns/checkered_pattern.png',
        'chruch.png' => '/img/subtle_patterns/chruch.png',
        'circles.png' => '/img/subtle_patterns/circles.png',
        'classy_fabric.png' => '/img/subtle_patterns/classy_fabric.png',
        'clean_textile.png' => '/img/subtle_patterns/clean_textile.png',
        'climpek.png' => '/img/subtle_patterns/climpek.png',
        'cloth_alike.png' => '/img/subtle_patterns/cloth_alike.png',
        'concrete_wall.png' => '/img/subtle_patterns/concrete_wall.png',
        'concrete_wall_2.png' => '/img/subtle_patterns/concrete_wall_2.png',
        'concrete_wall_3.png' => '/img/subtle_patterns/concrete_wall_3.png',
        'connect.png' => '/img/subtle_patterns/connect.png',
        'cork_1.png' => '/img/subtle_patterns/cork_1.png',
        'corrugation.png' => '/img/subtle_patterns/corrugation.png',
        'cracks_1.png' => '/img/subtle_patterns/cracks_1.png',
        'cream_dust.png' => '/img/subtle_patterns/cream_dust.png',
        'cream_pixels.png' => '/img/subtle_patterns/cream_pixels.png',
        'creampaper.png' => '/img/subtle_patterns/creampaper.png',
        'crisp_paper_ruffles.png' => '/img/subtle_patterns/crisp_paper_ruffles.png',
        'crissXcross.png' => '/img/subtle_patterns/crissXcross.png',
        'cross_scratches.png' => '/img/subtle_patterns/cross_scratches.png',
        'crossed_stripes.png' => '/img/subtle_patterns/crossed_stripes.png',
        'crosses.png' => '/img/subtle_patterns/crosses.png',
        'cubes.png' => '/img/subtle_patterns/cubes.png',
        'cutcube.png' => '/img/subtle_patterns/cutcube.png',
        'daimond_eyes.png' => '/img/subtle_patterns/daimond_eyes.png',
        'dark_brick_wall.png' => '/img/subtle_patterns/dark_brick_wall.png',
        'dark_circles.png' => '/img/subtle_patterns/dark_circles.png',
        'dark_dotted.png' => '/img/subtle_patterns/dark_dotted.png',
        'dark_dotted2.png' => '/img/subtle_patterns/dark_dotted2.png',
        'dark_exa.png' => '/img/subtle_patterns/dark_exa.png',
        'dark_fish_skin.png' => '/img/subtle_patterns/dark_fish_skin.png',
        'dark_geometric.png' => '/img/subtle_patterns/dark_geometric.png',
        'dark_leather.png' => '/img/subtle_patterns/dark_leather.png',
        'dark_matter.png' => '/img/subtle_patterns/dark_matter.png',
        'dark_mosaic.png' => '/img/subtle_patterns/dark_mosaic.png',
        'dark_stripes.png' => '/img/subtle_patterns/dark_stripes.png',
        'dark_Tire.png' => '/img/subtle_patterns/dark_Tire.png',
        'dark_wall.png' => '/img/subtle_patterns/dark_wall.png',
        'dark_wood.png' => '/img/subtle_patterns/dark_wood.png',
        'darkdenim3.png' => '/img/subtle_patterns/darkdenim3.png',
        'darth_stripe.png' => '/img/subtle_patterns/darth_stripe.png',
        'debut_dark.png' => '/img/subtle_patterns/debut_dark.png',
        'debut_light.png' => '/img/subtle_patterns/debut_light.png',
        'denim.png' => '/img/subtle_patterns/denim.png',
        'diagmonds.png' => '/img/subtle_patterns/diagmonds.png',
        'diagonal-noise.png' => '/img/subtle_patterns/diagonal-noise.png',
        'diagonal_striped_brick.png' => '/img/subtle_patterns/diagonal_striped_brick.png',
        'diagonal_waves.png' => '/img/subtle_patterns/diagonal_waves.png',
        'diagonales_decalees.png' => '/img/subtle_patterns/diagonales_decalees.png',
        'diamond_upholstery.png' => '/img/subtle_patterns/diamond_upholstery.png',
        'diamonds.png' => '/img/subtle_patterns/diamonds.png',
        'dimension.png' => '/img/subtle_patterns/dimension.png',
        'dirty_old_shirt.png' => '/img/subtle_patterns/dirty_old_shirt.png',
        'double_lined.png' => '/img/subtle_patterns/double_lined.png',
        'dust.png' => '/img/subtle_patterns/dust.png',
        'dvsup.png' => '/img/subtle_patterns/dvsup.png',
        'ecailles.png' => '/img/subtle_patterns/ecailles.png',
        'egg_shell.png' => '/img/subtle_patterns/egg_shell.png',
        'elastoplast.png' => '/img/subtle_patterns/elastoplast.png',
        'elegant_grid.png' => '/img/subtle_patterns/elegant_grid.png',
        'embossed_paper.png' => '/img/subtle_patterns/embossed_paper.png',
        'escheresque.png' => '/img/subtle_patterns/escheresque.png',
        'escheresque_ste.png' => '/img/subtle_patterns/escheresque_ste.png',
        'exclusive_paper.png' => '/img/subtle_patterns/exclusive_paper.png',
        'extra_clean_paper.png' => '/img/subtle_patterns/extra_clean_paper.png',
        'fabric_1.png' => '/img/subtle_patterns/fabric_1.png',
        'fabric_of_squares_gray.png' => '/img/subtle_patterns/fabric_of_squares_gray.png',
        'fabric_plaid.png' => '/img/subtle_patterns/fabric_plaid.png',
        'fake_brick.png' => '/img/subtle_patterns/fake_brick.png',
        'fake_luxury.png' => '/img/subtle_patterns/fake_luxury.png',
        'fancy_deboss.png' => '/img/subtle_patterns/fancy_deboss.png',
        'farmer.png' => '/img/subtle_patterns/farmer.png',
        'felt.png' => '/img/subtle_patterns/felt.png',
        'first_aid_kit.png' => '/img/subtle_patterns/first_aid_kit.png',
        'flowers.png' => '/img/subtle_patterns/flowers.png',
        'flowertrail.png' => '/img/subtle_patterns/flowertrail.png',
        'foggy_birds.png' => '/img/subtle_patterns/foggy_birds.png',
        'foil.png' => '/img/subtle_patterns/foil.png',
        'frenchstucco.png' => '/img/subtle_patterns/frenchstucco.png',
        'furley_bg.png' => '/img/subtle_patterns/furley_bg.png',
        'geometry.png' => '/img/subtle_patterns/geometry.png',
        'gold_scale.png' => '/img/subtle_patterns/gold_scale.png',
        'gplaypattern.png' => '/img/subtle_patterns/gplaypattern.png',
        'gradient_squares.png' => '/img/subtle_patterns/gradient_squares.png',
        'graphy.png' => '/img/subtle_patterns/graphy.png',
        'gray_jean.png' => '/img/subtle_patterns/gray_jean.png',
        'gray_sand.png' => '/img/subtle_patterns/gray_sand.png',
        'green-fibers.png' => '/img/subtle_patterns/green-fibers.png',
        'green_dust_scratch.png' => '/img/subtle_patterns/green_dust_scratch.png',
        'green_gobbler.png' => '/img/subtle_patterns/green_gobbler.png',
        'grey.png' => '/img/subtle_patterns/grey.png',
        'grey_sandbag.png' => '/img/subtle_patterns/grey_sandbag.png',
        'grey_wash_wall.png' => '/img/subtle_patterns/grey_wash_wall.png',
        'greyfloral.png' => '/img/subtle_patterns/greyfloral.png',
        'greyzz.png' => '/img/subtle_patterns/greyzz.png',
        'grid.png' => '/img/subtle_patterns/grid.png',
        'grid_noise.png' => '/img/subtle_patterns/grid_noise.png',
        'gridme.png' => '/img/subtle_patterns/gridme.png',
        'grilled.png' => '/img/subtle_patterns/grilled.png',
        'groovepaper.png' => '/img/subtle_patterns/groovepaper.png',
        'grunge_wall.png' => '/img/subtle_patterns/grunge_wall.png',
        'gun_metal.png' => '/img/subtle_patterns/gun_metal.png',
        'handmadepaper.png' => '/img/subtle_patterns/handmadepaper.png',
        'hexabump.png' => '/img/subtle_patterns/hexabump.png',
        'hexellence.png' => '/img/subtle_patterns/hexellence.png',
        'hixs_pattern_evolution.png' => '/img/subtle_patterns/hixs_pattern_evolution.png',
        'hoffman.png' => '/img/subtle_patterns/hoffman.png',
        'honey_im_subtle.png' => '/img/subtle_patterns/honey_im_subtle.png',
        'husk.png' => '/img/subtle_patterns/husk.png',
        'ice_age.png' => '/img/subtle_patterns/ice_age.png',
        'inflicted.png' => '/img/subtle_patterns/inflicted.png',
        'irongrip.png' => '/img/subtle_patterns/irongrip.png',
        'kindajean.png' => '/img/subtle_patterns/kindajean.png',
        'knitted-netting.png' => '/img/subtle_patterns/knitted-netting.png',
        'knitting250px.png' => '/img/subtle_patterns/knitting250px.png',
        'kuji.png' => '/img/subtle_patterns/kuji.png',
        'large_leather.png' => '/img/subtle_patterns/large_leather.png',
        'leather_1.png' => '/img/subtle_patterns/leather_1.png',
        'lghtmesh.png' => '/img/subtle_patterns/lghtmesh.png',
        'light_alu.png' => '/img/subtle_patterns/light_alu.png',
        'light_checkered_tiles.png' => '/img/subtle_patterns/light_checkered_tiles.png',
        'light_grey_floral_motif.png' => '/img/subtle_patterns/light_grey_floral_motif.png',
        'light_honeycomb.png' => '/img/subtle_patterns/light_honeycomb.png',
        'light_noise_diagonal.png' => '/img/subtle_patterns/light_noise_diagonal.png',
        'light_toast.png' => '/img/subtle_patterns/light_toast.png',
        'light_wool.png' => '/img/subtle_patterns/light_wool.png',
        'lightpaperfibers.png' => '/img/subtle_patterns/lightpaperfibers.png',
        'lil_fiber.png' => '/img/subtle_patterns/lil_fiber.png',
        'lined_paper.png' => '/img/subtle_patterns/lined_paper.png',
        'linedpaper.png' => '/img/subtle_patterns/linedpaper.png',
        'linen.png' => '/img/subtle_patterns/linen.png',
        'little_pluses.png' => '/img/subtle_patterns/little_pluses.png',
        'little_triangles.png' => '/img/subtle_patterns/little_triangles.png',
        'littleknobs.png' => '/img/subtle_patterns/littleknobs.png',
        'low_contrast_linen.png' => '/img/subtle_patterns/low_contrast_linen.png',
        'lyonnette.png' => '/img/subtle_patterns/lyonnette.png',
        'merely_cubed.png' => '/img/subtle_patterns/merely_cubed.png',
        'micro_carbon.png' => '/img/subtle_patterns/micro_carbon.png',
        'mirrored_squares.png' => '/img/subtle_patterns/mirrored_squares.png',
        'mochaGrunge.png' => '/img/subtle_patterns/mochaGrunge.png',
        'mooning.png' => '/img/subtle_patterns/mooning.png',
        'moulin.png' => '/img/subtle_patterns/moulin.png',
        'nami.png' => '/img/subtle_patterns/nami.png',
        'nasty_fabric.png' => '/img/subtle_patterns/nasty_fabric.png',
        'natural_paper.png' => '/img/subtle_patterns/natural_paper.png',
        'navy_blue.png' => '/img/subtle_patterns/navy_blue.png',
        'nistri.png' => '/img/subtle_patterns/nistri.png',
        'noise_lines.png' => '/img/subtle_patterns/noise_lines.png',
        'noise_pattern_with_crosslines.png' => '/img/subtle_patterns/noise_pattern_with_crosslines.png',
        'noisy.png' => '/img/subtle_patterns/noisy.png',
        'noisy_grid.png' => '/img/subtle_patterns/noisy_grid.png',
        'noisy_net.png' => '/img/subtle_patterns/noisy_net.png',
        'norwegian_rose.png' => '/img/subtle_patterns/norwegian_rose.png',
        'office.png' => '/img/subtle_patterns/office.png',
        'old_mathematics.png' => '/img/subtle_patterns/old_mathematics.png',
        'old_wall.png' => '/img/subtle_patterns/old_wall.png',
        'otis_redding.png' => '/img/subtle_patterns/otis_redding.png',
        'outlets.png' => '/img/subtle_patterns/outlets.png',
        'padded.png' => '/img/subtle_patterns/padded.png',
        'paper.png' => '/img/subtle_patterns/paper.png',
        'paper_1.png' => '/img/subtle_patterns/paper_1.png',
        'paper_2.png' => '/img/subtle_patterns/paper_2.png',
        'paper_3.png' => '/img/subtle_patterns/paper_3.png',
        'paper_fibers.png' => '/img/subtle_patterns/paper_fibers.png',
        'paven.png' => '/img/subtle_patterns/paven.png',
        'perforated_white_leather.png' => '/img/subtle_patterns/perforated_white_leather.png',
        'pineapplecut.png' => '/img/subtle_patterns/pineapplecut.png',
        'pinstripe.png' => '/img/subtle_patterns/pinstripe.png',
        'pinstriped_suit.png' => '/img/subtle_patterns/pinstriped_suit.png',
        'pixel_weave.png' => '/img/subtle_patterns/pixel_weave.png',
        'plaid.png' => '/img/subtle_patterns/plaid.png',
        'polaroid.png' => '/img/subtle_patterns/polaroid.png',
        'polonez_car.png' => '/img/subtle_patterns/polonez_car.png',
        'polyester_lite.png' => '/img/subtle_patterns/polyester_lite.png',
        'pool_table.png' => '/img/subtle_patterns/pool_table.png',
        'project_papper.png' => '/img/subtle_patterns/project_papper.png',
        'ps_neutral.png' => '/img/subtle_patterns/ps_neutral.png',
        'psychedelic_pattern.png' => '/img/subtle_patterns/psychedelic_pattern.png',
        'purty_wood.png' => '/img/subtle_patterns/purty_wood.png',
        'pw_maze_black.png' => '/img/subtle_patterns/pw_maze_black.png',
        'pw_maze_white.png' => '/img/subtle_patterns/pw_maze_white.png',
        'pw_pattern.png' => '/img/subtle_patterns/pw_pattern.png',
        'px_by_Gre3g.png' => '/img/subtle_patterns/px_by_Gre3g.png',
        'pyramid.png' => '/img/subtle_patterns/pyramid.png',
        'quilt.png' => '/img/subtle_patterns/quilt.png',
        'random_grey_variations.png' => '/img/subtle_patterns/random_grey_variations.png',
        'ravenna.png' => '/img/subtle_patterns/ravenna.png',
        'real_cf.png' => '/img/subtle_patterns/real_cf.png',
        'rebel.png' => '/img/subtle_patterns/rebel.png',
        'redox_01.png' => '/img/subtle_patterns/redox_01.png',
        'redox_02.png' => '/img/subtle_patterns/redox_02.png',
        'reticular_tissue.png' => '/img/subtle_patterns/reticular_tissue.png',
        'retina_wood.png' => '/img/subtle_patterns/retina_wood.png',
        'retro_intro.png' => '/img/subtle_patterns/retro_intro.png',
        'ricepaper.png' => '/img/subtle_patterns/ricepaper.png',
        'ricepaper2.png' => '/img/subtle_patterns/ricepaper2.png',
        'rip_jobs.png' => '/img/subtle_patterns/rip_jobs.png',
        'robots.png' => '/img/subtle_patterns/robots.png',
        'rockywall.png' => '/img/subtle_patterns/rockywall.png',
        'rough_diagonal.png' => '/img/subtle_patterns/rough_diagonal.png',
        'roughcloth.png' => '/img/subtle_patterns/roughcloth.png',
        'rubber_grip.png' => '/img/subtle_patterns/rubber_grip.png',
        'satinweave.png' => '/img/subtle_patterns/satinweave.png',
        'scribble_light.png' => '/img/subtle_patterns/scribble_light.png',
        'shattered.png' => '/img/subtle_patterns/shattered.png',
        'shinecaro.png' => '/img/subtle_patterns/shinecaro.png',
        'shinedotted.png' => '/img/subtle_patterns/shinedotted.png',
        'shl.png' => '/img/subtle_patterns/shl.png',
        'silver_scales.png' => '/img/subtle_patterns/silver_scales.png',
        'simple_dashed.png' => '/img/subtle_patterns/simple_dashed.png',
        'skelatal_weave.png' => '/img/subtle_patterns/skelatal_weave.png',
        'skewed_print.png' => '/img/subtle_patterns/skewed_print.png',
        'skin_side_up.png' => '/img/subtle_patterns/skin_side_up.png',
        'slash_it.png' => '/img/subtle_patterns/slash_it.png',
        'small-crackle-bright.png' => '/img/subtle_patterns/small-crackle-bright.png',
        'small_tiles.png' => '/img/subtle_patterns/small_tiles.png',
        'smooth_wall.png' => '/img/subtle_patterns/smooth_wall.png',
        'sneaker_mesh_fabric.png' => '/img/subtle_patterns/sneaker_mesh_fabric.png',
        'snow.png' => '/img/subtle_patterns/snow.png',
        'soft_circle_scales.png' => '/img/subtle_patterns/soft_circle_scales.png',
        'soft_kill.png' => '/img/subtle_patterns/soft_kill.png',
        'soft_pad.png' => '/img/subtle_patterns/soft_pad.png',
        'soft_wallpaper.png' => '/img/subtle_patterns/soft_wallpaper.png',
        'solid.png' => '/img/subtle_patterns/solid.png',
        'squairy_light.png' => '/img/subtle_patterns/squairy_light.png',
        'square_bg.png' => '/img/subtle_patterns/square_bg.png',
        'squares.png' => '/img/subtle_patterns/squares.png',
        'stacked_circles.png' => '/img/subtle_patterns/stacked_circles.png',
        'starring.png' => '/img/subtle_patterns/starring.png',
        'stitched_wool.png' => '/img/subtle_patterns/stitched_wool.png',
        'strange_bullseyes.png' => '/img/subtle_patterns/strange_bullseyes.png',
        'straws.png' => '/img/subtle_patterns/straws.png',
        'stressed_linen.png' => '/img/subtle_patterns/stressed_linen.png',
        'striped_lens.png' => '/img/subtle_patterns/striped_lens.png',
        'struckaxiom.png' => '/img/subtle_patterns/struckaxiom.png',
        'stucco.png' => '/img/subtle_patterns/stucco.png',
        'subtle_carbon.png' => '/img/subtle_patterns/subtle_carbon.png',
        'subtle_dots.png' => '/img/subtle_patterns/subtle_dots.png',
        'subtle_freckles.png' => '/img/subtle_patterns/subtle_freckles.png',
        'subtle_grunge.png' => '/img/subtle_patterns/subtle_grunge.png',
        'subtle_orange_emboss.png' => '/img/subtle_patterns/subtle_orange_emboss.png',
        'subtle_stripes.png' => '/img/subtle_patterns/subtle_stripes.png',
        'subtle_surface.png' => '/img/subtle_patterns/subtle_surface.png',
        'subtle_white_feathers.png' => '/img/subtle_patterns/subtle_white_feathers.png',
        'subtle_zebra_3d.png' => '/img/subtle_patterns/subtle_zebra_3d.png',
        'subtlenet2.png' => '/img/subtle_patterns/subtlenet2.png',
        'swirl.png' => '/img/subtle_patterns/swirl.png',
        'tactile_noise.png' => '/img/subtle_patterns/tactile_noise.png',
        'tapestry_pattern.png' => '/img/subtle_patterns/tapestry_pattern.png',
        'tasky_pattern.png' => '/img/subtle_patterns/tasky_pattern.png',
        'tex2res1.png' => '/img/subtle_patterns/tex2res1.png',
        'tex2res2.png' => '/img/subtle_patterns/tex2res2.png',
        'tex2res3.png' => '/img/subtle_patterns/tex2res3.png',
        'tex2res4.png' => '/img/subtle_patterns/tex2res4.png',
        'tex2res5.png' => '/img/subtle_patterns/tex2res5.png',
        'textured_paper.png' => '/img/subtle_patterns/textured_paper.png',
        'textured_stripes.png' => '/img/subtle_patterns/textured_stripes.png',
        'texturetastic_gray.png' => '/img/subtle_patterns/texturetastic_gray.png',
        'ticks.png' => '/img/subtle_patterns/ticks.png',
        'tileable_wood_texture.png' => '/img/subtle_patterns/tileable_wood_texture.png',
        'tiny_grid.png' => '/img/subtle_patterns/tiny_grid.png',
        'triangles.png' => '/img/subtle_patterns/triangles.png',
        'triangles_pattern.png' => '/img/subtle_patterns/triangles_pattern.png',
        'triangular.png' => '/img/subtle_patterns/triangular.png',
        'tweed.png' => '/img/subtle_patterns/tweed.png',
        'twinkle_twinkle.png' => '/img/subtle_patterns/twinkle_twinkle.png',
        'txture.png' => '/img/subtle_patterns/txture.png',
        'type.png' => '/img/subtle_patterns/type.png',
        'use_your_illusion.png' => '/img/subtle_patterns/use_your_illusion.png',
        'vaio_hard_edge.png' => '/img/subtle_patterns/vaio_hard_edge.png',
        'vertical_cloth.png' => '/img/subtle_patterns/vertical_cloth.png',
        'vichy.png' => '/img/subtle_patterns/vichy.png',
        'vintage_speckles.png' => '/img/subtle_patterns/vintage_speckles.png',
        'wall4.png' => '/img/subtle_patterns/wall4.png',
        'washi.png' => '/img/subtle_patterns/washi.png',
        'wavecut.png' => '/img/subtle_patterns/wavecut.png',
        'wavegrid.png' => '/img/subtle_patterns/wavegrid.png',
        'weave.png' => '/img/subtle_patterns/weave.png',
        'white_bed_sheet.png' => '/img/subtle_patterns/white_bed_sheet.png',
        'white_brick_wall.png' => '/img/subtle_patterns/white_brick_wall.png',
        'white_carbon.png' => '/img/subtle_patterns/white_carbon.png',
        'white_carbonfiber.png' => '/img/subtle_patterns/white_carbonfiber.png',
        'white_leather.png' => '/img/subtle_patterns/white_leather.png',
        'white_paperboard.png' => '/img/subtle_patterns/white_paperboard.png',
        'white_plaster.png' => '/img/subtle_patterns/white_plaster.png',
        'white_sand.png' => '/img/subtle_patterns/white_sand.png',
        'white_texture.png' => '/img/subtle_patterns/white_texture.png',
        'white_tiles.png' => '/img/subtle_patterns/white_tiles.png',
        'white_wall.png' => '/img/subtle_patterns/white_wall.png',
        'white_wall2.png' => '/img/subtle_patterns/white_wall2.png',
        'white_wall_hash.png' => '/img/subtle_patterns/white_wall_hash.png',
        'white_wave.png' => '/img/subtle_patterns/white_wave.png',
        'whitediamond.png' => '/img/subtle_patterns/whitediamond.png',
        'whitey.png' => '/img/subtle_patterns/whitey.png',
        'wide_rectangles.png' => '/img/subtle_patterns/wide_rectangles.png',
        'wild_oliva.png' => '/img/subtle_patterns/wild_oliva.png',
        'witewall_3.png' => '/img/subtle_patterns/witewall_3.png',
        'wood_1.jpg' => '/img/subtle_patterns/wood_1.jpg',
        'wood_1.png' => '/img/subtle_patterns/wood_1.png',
        'wood_pattern.png' => '/img/subtle_patterns/wood_pattern.png',
        'worn_dots.png' => '/img/subtle_patterns/worn_dots.png',
        'woven.png' => '/img/subtle_patterns/woven.png',
        'zigzag.png' => '/img/subtle_patterns/zigzag.png',
    );
    

    foreach($patterns as &$item){
        $item = get_template_directory_uri(). $item;
    }


    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        'opt_name' => 'logancee_options',
        'use_cdn' => TRUE,
        'display_name' => 'instax Options',
        'display_version' => '1.2.2',
        'page_title' => 'instax Options',
        'update_notice' => FALSE,
        'disable_tracking' => TRUE,
        'admin_bar' => TRUE,
        'menu_type' => 'menu',
        'menu_title' => 'instax Options',
        'templates_path' => get_template_directory() .'/admin/redux-framework/templates/panel',
        'allow_sub_menu' => TRUE,
        'page_parent_post_type' => 'your_post_type',
        'customizer' => TRUE,
        'default_mark' => '*',
        'hints' => array(
            'icon' => 'el el-question',
            'icon_position' => 'right',
            'icon_size' => 'normal',
            'tip_style' => array(
                'color' => 'light',
            ),
            'tip_position' => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect' => array(
                'show' => array(
                    'duration' => '500',
                    'event' => 'mouseover',
                ),
                'hide' => array(
                    'duration' => '500',
                    'event' => 'mouseleave unfocus',
                ),
            ),
        ),
        'output' => TRUE,
        'output_tag' => TRUE,
        'settings_api' => TRUE,
        'cdn_check_time' => '1440',
        'compiler' => TRUE,
        'page_permissions' => 'manage_options',
        'save_defaults' => TRUE,
        'show_import_export' => TRUE,
        'database' => 'options',
        'transient_time' => '3600',
        'network_sites' => TRUE,
        'dev_mode' => FALSE,
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.


    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => esc_html__( 'Theme Information 1', 'logancee' ),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'logancee' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => esc_html__( 'Theme Information 2', 'logancee' ),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'logancee' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = esc_html__( '<p>This is the sidebar content, HTML is allowed.</p>', 'logancee' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


 
    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    // -> START Fields
  
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'General settings', 'logancee' ),
        'id'               => 'general',
        'desc'             => esc_html__( 'These are really basic fields!', 'logancee' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-icon-cogs'
    ) );
    
    
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Layout', 'logancee' ),
        'id'         => 'general-layout',
        'desc'       => esc_html__( 'Basic options regarding website layout', 'logancee'  ) ,
        'subsection' => true,
        'fields'     => array(

            array(
                'id'       => 'layout-page-width',
                'type'     => 'select',
                'title'    => esc_html__( 'Page width', 'logancee' ),
                'subtitle' => esc_html__( 'Set the maximum page width', 'logancee' ),
                'options'  => array(
                    '1' => 'Wide (1220px)',
                    '2' => 'Narrow (980px)',
                    '3' => 'Custom width',
                ),
                'default'  => '1'
            ),
            
            array(
                'id'       => 'layout-page-width-custom-value',
                'type'     => 'text',
                'title'    => 'Max page width',
                'required' => array( 'layout-page-width', '=', 3 )
            ),
            
            array(
                'id'=>'layout-type',
                'type' => 'image_select',
                'compiler'=>true,
                'title' => 'Main Layout',
                'options' => array(
                    'fullwidth' => array('alt' => 'Full Width', 'img' => ReduxFramework::$_url.'assets/img/1col.png'),
                    'left-sidebar' => array('alt' => 'Left Sidebar', 'img' => ReduxFramework::$_url.'assets/img/2cl.png'),
                    'right-sidebar' => array('alt' => 'Right Sidebar', 'img' => ReduxFramework::$_url.'assets/img/2cr.png')
                ),
                'default' => 'left-sidebar'
           ),
            
            array(
                'id'=>'layout-type',
                'type' => 'image_select',
                'compiler'=>true,
                'title' => 'Main Layout',
                'options' => array(
                    'fullwidth' => array('alt' => 'Full Width', 'img' => ReduxFramework::$_url.'assets/img/1col.png'),
                    'left-sidebar' => array('alt' => 'Left Sidebar', 'img' => ReduxFramework::$_url.'assets/img/2cl.png'),
                    'right-sidebar' => array('alt' => 'Right Sidebar', 'img' => ReduxFramework::$_url.'assets/img/2cr.png')
                ),
                'default' => 'left-sidebar'
            ),
            array(
                'id'=>'layout-type-home',
                'type' => 'image_select',
                'compiler'=>true,
                'title' => 'Homepage layout',
                'options' => array(
                    'fullwidth' => array('alt' => 'Full Width', 'img' => ReduxFramework::$_url.'assets/img/1col.png'),
                    'left-sidebar' => array('alt' => 'Left Sidebar', 'img' => ReduxFramework::$_url.'assets/img/2cl.png'),
                    'right-sidebar' => array('alt' => 'Right Sidebar', 'img' => ReduxFramework::$_url.'assets/img/2cr.png')
                ),
                'default' => 'fullwidth'
            ),
            
            array(
                'id'=>'layout-type-blog',
                'type' => 'image_select',
                'compiler'=>true,
                'title' => 'Blog Layout',
                'options' => array(
                    'fullwidth' => array('alt' => 'Full Width', 'img' => ReduxFramework::$_url.'assets/img/1col.png'),
                    'left-sidebar' => array('alt' => 'Left Sidebar', 'img' => ReduxFramework::$_url.'assets/img/2cl.png'),
                    'right-sidebar' => array('alt' => 'Right Sidebar', 'img' => ReduxFramework::$_url.'assets/img/2cr.png')
                ),
                'default' => 'left-sidebar'
            ),
            
            
            array(
                'id'=>'layout-type-single-post',
                'type' => 'image_select',
                'compiler'=>true,
                'title' => 'Single Post Layout',
                'options' => array(
                    'fullwidth' => array('alt' => 'Full Width', 'img' => ReduxFramework::$_url.'assets/img/1col.png'),
                    'left-sidebar' => array('alt' => 'Left Sidebar', 'img' => ReduxFramework::$_url.'assets/img/2cl.png'),
                    'right-sidebar' => array('alt' => 'Right Sidebar', 'img' => ReduxFramework::$_url.'assets/img/2cr.png')
                ),
                'default' => 'left-sidebar'
            ),

            array(
                'id'=>'layout-type-portfolio',
                'type' => 'image_select',
                'compiler'=>true,
                'title' => 'Portfolio list Layout',
                'options' => array(
                    'fullwidth' => array('alt' => 'Full Width', 'img' => ReduxFramework::$_url.'assets/img/1col.png'),
                    'left-sidebar' => array('alt' => 'Left Sidebar', 'img' => ReduxFramework::$_url.'assets/img/2cl.png'),
                    'right-sidebar' => array('alt' => 'Right Sidebar', 'img' => ReduxFramework::$_url.'assets/img/2cr.png')
                ),
                'default' => 'fullwidth'
            ),


            array(
                'id'=>'layout-type-single-portfolio',
                'type' => 'image_select',
                'compiler'=>true,
                'title' => 'Single Portfolio Layout',
                'options' => array(
                    'fullwidth' => array('alt' => 'Full Width', 'img' => ReduxFramework::$_url.'assets/img/1col.png'),
                    'left-sidebar' => array('alt' => 'Left Sidebar', 'img' => ReduxFramework::$_url.'assets/img/2cl.png'),
                    'right-sidebar' => array('alt' => 'Right Sidebar', 'img' => ReduxFramework::$_url.'assets/img/2cr.png')
                ),
                'default' => 'fullwidth'
            ),

            
             array(
                'id'=>'layout-type-woocategory',
                'type' => 'image_select',
                'compiler'=>true,
                'title' => 'WooCommerce Category Layout',
                'options' => array(
                    'fullwidth' => array('alt' => 'Full Width', 'img' => ReduxFramework::$_url.'assets/img/1col.png'),
                    'left-sidebar' => array('alt' => 'Left Sidebar', 'img' => ReduxFramework::$_url.'assets/img/2cl.png'),
                    'right-sidebar' => array('alt' => 'Right Sidebar', 'img' => ReduxFramework::$_url.'assets/img/2cr.png')
                ),
                'default' => 'left-sidebar'
            ),
            
            array(
                'id'=>'layout-type-wooproduct',
                'type' => 'image_select',
                'compiler'=>true,
                'title' => 'WooCommerce Product Layout',
                'options' => array(
                    'fullwidth' => array('alt' => 'Full Width', 'img' => ReduxFramework::$_url.'assets/img/1col.png'),
                    'left-sidebar' => array('alt' => 'Left Sidebar', 'img' => ReduxFramework::$_url.'assets/img/2cl.png'),
                    'right-sidebar' => array('alt' => 'Right Sidebar', 'img' => ReduxFramework::$_url.'assets/img/2cr.png')
                ),
                'default' => 'fullwidth'
            ),

            array(
                'id'       => 'layout-responsive',
                'type'     => 'switch',
                'title'    => esc_html__( 'Responsive', 'logancee' ),
                'subtitle' => esc_html__( 'Responsive website', 'logancee' ),
                'default'  => true,
            ),
            array(
                'id'       => 'layout-logotype',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Logotype', 'logancee' ),
                'compiler' => 'true',
                'subtitle' => esc_html__( 'Logotype used in header', 'logancee' ),
            ),
            array(
                'id'       => 'layout-favicon',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Favicon', 'logancee' ),
                'compiler' => 'true',
            ),

            array(
                'id'       => 'layout-breadcrumb-background',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Breadcrumb background', 'logancee' ),
                'compiler' => 'true',
                'subtitle' => esc_html__( 'background used in breadcrumb', 'logancee' ),
            ),
            array(
                'id'       => 'layout-breadcrumb-background-blog',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Blog breadcrumb background', 'logancee' ),
                'compiler' => 'true',
                'subtitle' => esc_html__( 'background used in breadcrumb', 'logancee' ),
            ),
            array(
                'id'       => 'layout-breadcrumb-background-single-post',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Single post breadcrumb background', 'logancee' ),
                'compiler' => 'true',
                'subtitle' => esc_html__( 'background used in breadcrumb', 'logancee' ),
            ),
            array(
                'id'       => 'layout-breadcrumb-background-portfolio',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Portfolio breadcrumb background', 'logancee' ),
                'compiler' => 'true',
                'subtitle' => esc_html__( 'background used in breadcrumb', 'logancee' ),
            ),
            array(
                'id'       => 'layout-breadcrumb-background-single-portfolio',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Single portfolio breadcrumb background', 'logancee' ),
                'compiler' => 'true',
                'subtitle' => esc_html__( 'background used in breadcrumb', 'logancee' ),
            ),
            array(
                'id'       => 'layout-breadcrumb-background-woocategory',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'WooCategory breadcrumb background', 'logancee' ),
                'compiler' => 'true',
                'subtitle' => esc_html__( 'background used in breadcrumb', 'logancee' ),
            ),
            array(
                'id'       => 'layout-breadcrumb-background-wooproduct',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Product breadcrumb background', 'logancee' ),
                'compiler' => 'true',
                'subtitle' => esc_html__( 'background used in breadcrumb', 'logancee' ),
            ),


            array(
                'id'       => 'layout-section-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Layout types', 'logancee' ),
                'subtitle' => esc_html__( 'Set layout type for main parts of website', 'logancee' ),
                'indent'   => true, // Indent all options below until the next 'section' option is set.
            ),
            array(
                'id'       => 'layout-main',
                'type'     => 'select',
                'title'    => esc_html__( 'Main layout', 'logancee' ),
                'subtitle' => esc_html__( 'Mainlayout main type', 'logancee' ),
                'options'  => array(
                    '1' => 'Full width',
                    '2' => 'Boxed',
                ),
                'default'  => '1'
            ),
            array(
                'id'       => 'layout-top-bar',
                'type'     => 'select',
                'title'    => esc_html__( 'Top bar layout', 'logancee' ),
                'subtitle' => esc_html__( 'Top bar layout main type', 'logancee' ),
                'options'  => array(
                    '1' => 'Full width',
                    '2' => 'Boxed',
                ),
                'default'  => '1'
            ),
            array(
                'id'       => 'layout-header',
                'type'     => 'select',
                'title'    => esc_html__( 'Header layout', 'logancee' ),
                'subtitle' => esc_html__( 'Header layout main type', 'logancee' ),
                'options'  => array(
                    '1' => 'Full width',
                    '2' => 'Boxed',
                ),
                'default'  => '1'
            ),
            array(
                'id'       => 'layout-slideshow',
                'type'     => 'select',
                'title'    => esc_html__( 'Slideshow layout', 'logancee' ),
                'subtitle' => esc_html__( 'Slideshow layout main type', 'logancee' ),
                'options'  => array(
                    '1' => 'Full width',
                    '2' => 'Boxed',
                ),
                'default'  => '1'
            ),
            array(
                'id'       => 'layout-breadcrumb',
                'type'     => 'select',
                'title'    => esc_html__( 'Breadcrumb layout', 'logancee' ),
                'subtitle' => esc_html__( 'Breadcrumb layout main type', 'logancee' ),
                'options'  => array(
                    '1' => 'Full width',
                    '2' => 'Boxed',
                ),
                'default'  => '1'
            ),
            array(
                'id'       => 'layout-content',
                'type'     => 'select',
                'title'    => esc_html__( 'Content layout', 'logancee' ),
                'subtitle' => esc_html__( 'Content layout main type', 'logancee' ),
                'options'  => array(
                    '1' => 'Full width',
                    '2' => 'Boxed',
                ),
                'default'  => '1'
            ),
            array(
                'id'       => 'layout-custom-footer',
                'type'     => 'select',
                'title'    => esc_html__( 'Custom footer layout', 'logancee' ),
                'subtitle' => esc_html__( 'Custom footer layout main type', 'logancee' ),
                'options'  => array(
                    '1' => 'Full width',
                    '2' => 'Boxed',
                ),
                'default'  => '1'
            ),
            array(
                'id'       => 'layout-footer',
                'type'     => 'select',
                'title'    => esc_html__( 'Footer layout', 'logancee' ),
                'subtitle' => esc_html__( 'Footer layout main type', 'logancee' ),
                'options'  => array(
                    '1' => 'Full width',
                    '2' => 'Boxed',
                ),
                'default'  => '1'
            ),
            array(
                'id'     => 'layout-section-end',
                'type'   => 'section',
                'indent' => false, // Indent all options below until the next 'section' option is set.
            ),

        )
    ) );
    
    
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Homepage', 'logancee' ),
        'id'         => 'general-homepage',
        'desc'       => esc_html__( 'Basic options regarding homepage layout', 'logancee' ) ,
        'subsection' => true,
        'fields'     => array(

            array(
                'id'       => 'homepage-slideshow-type',
                'type'     => 'select',
                'title'    => esc_html__( 'Slider Type', 'logancee' ),
                'options'  => array(
                    'custom_block' => 'Custom Block',
                    'revslider' => 'Revolution Slider',
                ),
                'default'  => 'block'
            ),
            
            array(
                'id'       => 'homepage-slideshow-revslider',
                'type'     => 'select',
                'title'    => 'Revolution slider',
                'options'  => logancee_revslider_list(),
                'required' => array( 'homepage-slideshow-type', '=', 'revslider' )
            ),
            
            array(
                'id'       => 'homepage-slideshow-custom_block',
                'type'     => 'text',
                'title'    => 'Custom Block name',
                'required' => array( 'homepage-slideshow-type', '=', 'custom_block' )
            ),
        )
    ));
    
    
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Blog', 'logancee' ),
        'id'         => 'general-blog',
        'desc'       => esc_html__( 'Basic options regarding blog layout', 'logancee' ) ,
        'subsection' => true,
        'fields'     => array(

            array(
                'id'       => 'blog-slideshow-type',
                'type'     => 'select',
                'title'    => esc_html__( 'Slider Type', 'logancee' ),
                'options'  => array(
                    'custom_block' => 'Custom Block',
                    'revslider' => 'Revolution Slider',
                ),
                'default'  => 'block'
            ),
            
            array(
                'id'       => 'blog-slideshow-revslider',
                'type'     => 'select',
                'title'    => 'Revolution slider',
                'options'  => logancee_revslider_list(),
                'required' => array( 'blog-slideshow-type', '=', 'revslider' )
            ),
            
            array(
                'id'       => 'blog-slideshow-custom_block',
                'type'     => 'text',
                'title'    => 'Custom Block name',
                'required' => array( 'blog-slideshow-type', '=', 'custom_block' )
            ),
            

            array(
                'id'       => 'blog-article_list_template',
                'type'     => 'select',
                'title'    => esc_html__( 'Article list template', 'logancee' ),
                'options'  => array(
                    'default' => 'Default',
                    'logancee' => 'instax',
                    'grid' => 'Grid',
                    'grid_3_columns' => 'Grid with 3 columns',
                    'small_thumbs' => 'Small thumbs',
                ),
                'default'  => 'instax'
            ),
        )
    ));
    
    
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Portfolio', 'logancee' ),
        'id'         => 'general-portfolio',
        'desc'       => esc_html__( 'Basic options regarding portfolio layout', 'logancee' ) ,
        'subsection' => true,
        'fields'     => array(

            array(
                'id'       => 'portfolio-slideshow-type',
                'type'     => 'select',
                'title'    => esc_html__( 'Slider Type', 'logancee' ),
                'options'  => array(
                    'custom_block' => 'Custom Block',
                    'revslider' => 'Revolution Slider',
                ),
                'default'  => 'block'
            ),
            
            array(
                'id'       => 'portfolio-slideshow-revslider',
                'type'     => 'select',
                'title'    => 'Revolution slider',
                'options'  => logancee_revslider_list(),
                'required' => array( 'portfolio-slideshow-type', '=', 'revslider' )
            ),
            
            array(
                'id'       => 'portfolio-slideshow-custom_block',
                'type'     => 'text',
                'title'    => 'Custom Block name',
                'required' => array( 'portfolio-slideshow-type', '=', 'custom_block' )
            ),

            array(
                'id'       => 'portfolio-limit',
                'type'     => 'select',
                'title'    => esc_html__( 'Portfolio limit per page', 'logancee' ),
                'options'  => array(
                    '4' => '4',
                    '5' => '5',
                    '6' => '6',
                    '7' => '7',
                    '8' => '8',
                    '9' => '9',
                    '10' => '10',
                    '11' => '11',
                    '12' => '12',
                    '13' => '13',
                    '14' => '14',
                    '15' => '15',
                    '16' => '16',
                    '17' => '17',
                    '18' => '18',
                    '19' => '19',
                    '20' => '20',
                    '25' => '25',
                    '50' => '50',
                    '100' => '100',
                ),
                'default'  => '6'
            ),

        )
    ));
    
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Category', 'logancee' ),
        'id'         => 'general-category',
        'desc'       => esc_html__( 'Basic options regarding category', 'logancee' ) ,
        'subsection' => true,
        'fields'     => array(
           
            array(
                'id'       => 'category-default-list-grid',
                'type'     => 'select',
                'title'    => esc_html__( 'Default product display', 'logancee' ),
                'options'  => array(
                    '0' => 'List',
                    '1' => 'Grid',
                ),
                'default'  => '1'
            ),
            array(
                'id'       => 'category-product-per-page',
                'type'     => 'select',
                'title'    => esc_html__( 'Product per row', 'logancee' ),
                'subtitle' => esc_html__( 'Only for grid display', 'logancee' ),
                'options'  => array(
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                    '6' => '6',
                ),
                'default'  => '3'
            ),
        )
    ));
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Product', 'logancee' ),
        'id'         => 'general-product',
        'desc'       => esc_html__( 'Basic options regarding product', 'logancee' ) ,
        'subsection' => true,
        'fields'     => array(

            array(
                'id'       => 'product-lazy-load-img',
                'type'     => 'switch',
                'title'    => esc_html__( 'Lazy loading images', 'logancee' ),
                'subtitle' => esc_html__( 'Responsive website', 'logancee' ),
                'default'  => true,
            ),
            array(
                'id'       => 'product-section-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Sale badge', 'logancee' ),
                'subtitle' => esc_html__( 'Sale badge configuration', 'logancee' ),
                'indent'   => true, // Indent all options below until the next 'section' option is set.
            ),
            array(
                'id'       => 'product-sale-badge-status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Status', 'logancee' ),
                'subtitle' => esc_html__( 'Display sale badge or not', 'logancee' ),
                'default'  => true,
            ),
            
            array(
                'id'     => 'product-section-end',
                'type'   => 'section',
                'indent' => true, // Indent all options below until the next 'section' option is set.
            ),
            array(
                'id'       => 'product-section-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Product page', 'logancee' ),
                'subtitle' => esc_html__( 'Product page configuration', 'logancee' ),
                'indent'   => true, // Indent all options below until the next 'section' option is set.
            ),
            array(
                'id'       => 'productpage-layout',
                'type'     => 'select',
                'title'    => esc_html__( 'Products page layout', 'logancee' ),
                'options'  => array(
                    '0' => 'Standard',
                    '1' => 'Tabs top',
                ),
                'default'  => '0'
            ),
            array(
                'id'       => 'productpage-image-zoom',
                'type'     => 'select',
                'title'    => esc_html__( 'Products image zoom', 'logancee' ),
                'options'  => array(
                    '0' => 'Cloud Zoom (Square)',
                    '3' => 'Cloud Zoom (Round)',
                    '1' => 'Inner Cloud Zoom',
                    '2' => 'Default',
                ),
                'default'  => '0'
            ),
            array(
                'id'       => 'productpage-image-size',
                'type'     => 'select',
                'title'    => esc_html__( 'Products image size', 'logancee' ),
                'options'  => array(
                    '1' => 'Small',
                    '2' => 'Medium',
                    '3' => 'Large',
                ),
                'default'  => '2'
            ),
            array(
                'id'       => 'productpage-image-additional',
                'type'     => 'select',
                'title'    => esc_html__( 'Products image additional', 'logancee' ),
                'options'  => array(
                    '1' => 'Bottom',
                    '2' => 'Left',
                    '3' => 'Right',
                ),
                'default'  => '1'
            ),

            array(
                'id'       => 'productpage-socialshare-status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Product social share', 'logancee' ),
                'default'  => true,
            ),
            array(
                'id'       => 'productpage-related-status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Product related', 'logancee' ),
                'default'  => true,
            ),
            array(
                'id'     => 'product-section-end',
                'type'   => 'section',
                'indent' => true, // Indent all options below until the next 'section' option is set.
            ),
            
            
            array(
                'id'       => 'product-section-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Product grid', 'logancee' ),
                'subtitle' => esc_html__( 'Product grid configuration', 'logancee' ),
                'indent'   => true, // Indent all options below until the next 'section' option is set.
            ),
            array(
                'id'       => 'product-per-pow',
                'type'     => 'select',
                'title'    => esc_html__( 'Products per row', 'logancee' ),
                'options'  => array(
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                    '6' => '6',
                    '7' => '7',
                ),
                'default'  => '4'
            ),
            array(
                'id'       => 'product-image-effect',
                'type'     => 'select',
                'title'    => esc_html__( 'Image effect', 'logancee' ),
                'options'  => array(
                    '0' => 'None',
                    '1' => 'Swap image effect',
                    '2' => 'Zoom image effect',
                ),
                'default'  => '0'
            ),
            array(
                'id'       => 'product-quickview-status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Quick View', 'logancee' ),
                'default'  => false,
            ),
            array(
                'id'   => 'product-info-field',
                'type' => 'info',
                'desc' => esc_html__( 'Elements on product grids.', 'logancee' )
            ),
            
            array(
                'id'       => 'product-hover-status',
                'type'     => 'switch',
                'title'    => esc_html__( '- hover product', 'logancee' ),
                'default'  => true,
            ),
            array(
                'id'       => 'product-countdown-status',
                'type'     => 'switch',
                'title'    => esc_html__( '- special countdown', 'logancee' ),
                'default'  => false,
            ),
            array(
                'id'       => 'product-rating-status',
                'type'     => 'switch',
                'title'    => esc_html__( '- rating', 'logancee' ),
                'default'  => true,
            ),
            array(
                'id'       => 'product-addtocompare-status',
                'type'     => 'switch',
                'title'    => esc_html__( '- add to compare', 'logancee' ),
                'default'  => true,
            ),
            array(
                'id'       => 'product-addtowishlist-status',
                'type'     => 'switch',
                'title'    => esc_html__( '- add to wishlist', 'logancee' ),
                'default'  => true,
            ),
            array(
                'id'       => 'product-addtocart-status',
                'type'     => 'switch',
                'title'    => esc_html__( '- add to cart', 'logancee' ),
                'default'  => true,
            ),
            
            array(
                'id'   => 'product-info-field',
                'type' => 'info',
                'desc' => esc_html__( 'Product scroll', 'logancee' )
            ),
            array(
                'id'       => 'productscroll-latest-status',
                'type'     => 'switch',
                'title'    => esc_html__( '- latest', 'logancee' ),
                'default'  => true,
            ),
            array(
                'id'       => 'productscroll-featured-status',
                'type'     => 'switch',
                'title'    => esc_html__( '- featured', 'logancee' ),
                'default'  => true,
            ),
            array(
                'id'       => 'productscroll-bestsellers-status',
                'type'     => 'switch',
                'title'    => esc_html__( '- bestsellers', 'logancee' ),
                'default'  => true,
            ),
            array(
                'id'       => 'productscroll-specials-status',
                'type'     => 'switch',
                'title'    => esc_html__( '- specials', 'logancee' ),
                'default'  => true,
            ),
            array(
                'id'       => 'productscroll-related-status',
                'type'     => 'switch',
                'title'    => esc_html__( '- related', 'logancee' ),
                'default'  => true,
            ),
            
            array(
                'id'     => 'product-section-end',
                'type'   => 'section',
                'indent' => false, // Indent all options below until the next 'section' option is set.
            ),

        )
    ) );
    
    
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Header', 'logancee' ),
        'id'         => 'general-header',
        'desc'       => esc_html__( 'Basic options regarding header', 'logancee' ) ,
        'subsection' => true,
        'fields'     => array(

            array(
                'id'       => 'header-sticky-status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Sticky header', 'logancee' ),
                'subtitle' => esc_html__( 'Enable/disable sticky header', 'logancee' ),
                'default'  => false,
            ),
            array(
                'id'       => 'header-autocomplete-status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Quick search auto-suggest:', 'logancee' ),
                'subtitle' => esc_html__( 'Enable/disable quick search auto-suggest in header:', 'logancee' ),
                'default'  => true,
            ),
            array(
                'id'       => 'header-displayinmenu-status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Quick search in main menu:', 'logancee' ),
                'subtitle' => esc_html__( 'Enable/disable quick search in main menu:', 'logancee' ),
                'default'  => false,
            ),
            array(
                'id'       => 'header-section-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Select type', 'logancee' ),
                'subtitle' => esc_html__( 'Select type of header', 'logancee' ),
                'indent'   => true, // Indent all options below until the next 'section' option is set.
            ),

            array(
                'id'=>'header-type',
                'type' => 'image_select',
                'compiler'=>true,
                'title' => 'Header types',
                'options' => array(
                    '3' => array('alt' => 'instax', 'img' => logancee_sys_template_uri.'/img/instaxheader.jpg'),
                ),
                'default' => '1'
           ),
            
            array(
                'id'     => 'header-section-end',
                'type'   => 'section',
                'indent' => false, // Indent all options below until the next 'section' option is set.
            ),

        )
    ) );



    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Footer', 'logancee' ),
        'id'         => 'general-footer',
        'desc'       => esc_html__( 'Basic options regarding footer', 'logancee' ) ,
        'subsection' => true,
        'fields'     => array(

            array(
                'id'       => 'footer-status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Disable footer', 'logancee' ),
                'subtitle' => esc_html__( 'Enable/disable footer', 'logancee' ),
                'default'  => false,
            ),


        )
    ) );




Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Menu', 'logancee' ),
        'id'         => 'general-menu',
        'desc'       => esc_html__( 'Basic options regarding menu', 'logancee' ) ,
        'subsection' => true,
        'fields'     => array(
         
            array(
                'id'       => 'menu-animation-type',
                'type'     => 'radio',
                'title'    => esc_html__( 'Main menu animation type', 'logancee' ),
                'options'  => array(
                    'slide' => 'Slide',
                    'fade' => 'Fade',
                    'shift-up' => 'Shift up',
                    'shift-down' => 'Shift Down',
                    'shift-left' => 'Shift Left',
                    'flipping' => 'Flipping',
                    'none' => 'None'
                ),
                'default'  => 'slide'
            ),
            array(
                'id'       => 'menu-animation-time',
                'type'     => 'text',
                'title'    => esc_html__( 'Animation time', 'logancee' ),
            ),
            array(
                'id'     => 'header-section-end',
                'type'   => 'section',
                'indent' => false, // Indent all options below until the next 'section' option is set.
            ),

        )
    ) );
    
    

    // -> START Design Section
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Design', 'logancee' ),
        'id'    => 'design',
        'desc'  => esc_html__( '', 'logancee' ),
        'icon'  => 'el el-brush'
    ) );
    
     // -> START Typography
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Fonts', 'logancee' ),
        'id'     => 'design-font',
        'subsection' => true,
        'fields' => array(
            array(
                'id'       => 'font-status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Status', 'logancee' ),
                'subtitle' => esc_html__( 'Enable/disable custom colors ', 'logancee' ),
                'default'  => false,
            ),
            array(
                'id'       => 'font-body',
                'type'     => 'typography',
                'title'    => esc_html__( 'Body Font', 'logancee' ),
                'google'   => true,
                'default'  => array(
                    'color'       => '',
                    'font-size'   => '13px',
                    'font-family' => '',
                    'font-weight' => 'Normal',
                ),
            ),
            array(
                'id'       => 'font-body-smaller',
                'type'     => 'typography',
                'title'    => esc_html__( 'Body Font Smaller', 'logancee' ),
                'google'   => true,
                'default'  => array(
                    'color'       => '',
                    'font-size'   => '12px',
                    'font-family' => '',
                    'font-weight' => 'Normal',
                ),
            ),
            array(
                'id'       => 'font-categories_bar',
                'type'     => 'typography',
                'title'    => esc_html__( 'Categories bar', 'logancee' ),
                'google'   => true,
                'default'  => array(
                    'color'       => '',
                    'font-size'   => '16px',
                    'font-family' => '',
                    'font-weight' => 'Normal',
                ),
            ),
            array(
                'id'       => 'font-price',
                'type'     => 'typography',
                'title'    => esc_html__( 'Price', 'logancee' ),
                'google'   => true,
                'default'  => array(
                    'color'       => '',
                    'font-size'   => '36px',
                    'font-family' => '',
                    'font-weight' => 'Normal',
                ),
            ),
            array(
                'id'       => 'font-price_medium',
                'type'     => 'typography',
                'title'    => esc_html__( 'Price medium', 'logancee' ),
                'google'   => true,
                'default'  => array(
                    'color'       => '',
                    'font-size'   => '24px',
                    'font-family' => '',
                    'font-weight' => 'Normal',
                ),
            ),
            array(
                'id'       => 'font-price_small',
                'type'     => 'typography',
                'title'    => esc_html__( 'Price small', 'logancee' ),
                'google'   => true,
                'default'  => array(
                    'color'       => '',
                    'font-size'   => '13px',
                    'font-family' => '',
                    'font-weight' => 'Normal',
                ),
            ),
            array(
                'id'       => 'font-old_price',
                'type'     => 'typography',
                'title'    => esc_html__( 'Old price', 'logancee' ),
                'google'   => true,
                'default'  => array(
                    'color'       => '',
                    'font-size'   => '13px',
                    'font-family' => '',
                    'font-weight' => 'Normal',
                ),
            ),
            array(
                'id'       => 'font-headlines',
                'type'     => 'typography',
                'title'    => esc_html__( 'Headlines', 'logancee' ),
                'google'   => true,
                'default'  => array(
                    'color'       => '',
                    'font-size'   => '18px',
                    'font-family' => '',
                    'font-weight' => 'Normal',
                ),
            ),
            array(
                'id'       => 'font-footer_headlines',
                'type'     => 'typography',
                'title'    => esc_html__( 'Footer Headlines', 'logancee' ),
                'google'   => true,
                'default'  => array(
                    'color'       => '',
                    'font-size'   => '18px',
                    'font-family' => '',
                    'font-weight' => 'Normal',
                ),
            ),
            array(
                'id'       => 'font-page_name',
                'type'     => 'typography',
                'title'    => esc_html__( 'Page name', 'logancee' ),
                'google'   => true,
                'default'  => array(
                    'color'       => '',
                    'font-size'   => '30px',
                    'font-family' => '',
                    'font-weight' => 'Normal',
                ),
            ),
            array(
                'id'       => 'font-button',
                'type'     => 'typography',
                'title'    => esc_html__( 'Button', 'logancee' ),
                'google'   => true,
                'default'  => array(
                    'color'       => '',
                    'font-size'   => '14px',
                    'font-family' => '',
                    'font-weight' => 'Normal',
                ),
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Colors', 'logancee' ),
        'id'         => 'design-color',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'color-status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Status', 'logancee' ),
                'subtitle' => esc_html__( 'Enable/disable custom colors ', 'logancee' ),
                'default'  => false,
            ),
            array(
                'id'       => 'color-body-section-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Body', 'logancee' ),
                'indent'   => true, // Indent all options below until the next 'section' option is set.
            ),
            array(
                'id'       => 'color-body_font_text',
                'type'     => 'color',
                'output'   => array( '.site-title' ),
                'title'    => esc_html__( 'Body ', 'logancee' ),
                'default'  => '',
            ),
            array(
                'id'       => 'color-body_font_links',
                'type'     => 'color',
                'output'   => array( '.site-title' ),
                'title'    => esc_html__( 'Body links', 'logancee' ),
                'default'  => '',
            ),
            array(
                'id'       => 'color-body_font_links_hover',
                'type'     => 'color',
                'output'   => array( '.site-title' ),
                'title'    => esc_html__( 'Body links hover', 'logancee' ),
                'default'  => '',
            ),

            array(
                'id'       => 'color-body_price_text',
                'type'     => 'color',
                'output'   => array( '.site-title' ),
                'title'    => esc_html__( 'Price text', 'logancee' ),
                'default'  => '',
            ),
            array(
                'id'       => 'color-body_background_color',
                'type'     => 'color',
                'output'   => array( '.site-title' ),
                'title'    => esc_html__( 'Background', 'logancee' ),
                'default'  => '',
            ),
            array(
                'id'     => 'color-body-section-end',
                'type'   => 'section',
                'indent' => false, // Indent all options below until the next 'section' option is set.
            ),


            array(
                'id'       => 'color-top-section-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Top', 'logancee' ),
                'indent'   => true, // Indent all options below until the next 'section' option is set.
            ),
            array(
                'id'       => 'color-top_background_color',
                'type'     => 'color',
                'output'   => array( '.site-title' ),
                'title'    => esc_html__( 'Background', 'logancee' ),
                'default'  => '',
            ),
            array(
                'id'       => 'color-top_text_color',
                'type'     => 'color',
                'output'   => array( '.site-title' ),
                'title'    => esc_html__( 'Text', 'logancee' ),
                'default'  => '',
            ),
            array(
                'id'       => 'color-top_links_color',
                'type'     => 'color',
                'output'   => array( '.site-title' ),
                'title'    => esc_html__( 'Links', 'logancee' ),
                'default'  => '',
            ),
            array(
                'id'       => 'color-top_links_hover_color',
                'type'     => 'color',
                'output'   => array( '.site-title' ),
                'title'    => esc_html__( 'Links hover', 'logancee' ),
                'default'  => '',
            ),
            array(
                'id'       => 'color-top_border_color',
                'type'     => 'color',
                'output'   => array( '.site-title' ),
                'title'    => esc_html__( 'Border', 'logancee' ),
                'default'  => '',
            ),
            array(
                'id'     => 'color-top-section-end',
                'type'   => 'section',
                'indent' => false, // Indent all options below until the next 'section' option is set.
            ),


            array(
                'id'       => 'color-top_bar-section-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Top -> Top Bar', 'logancee' ),
                'indent'   => true, // Indent all options below until the next 'section' option is set.
            ),
            array(
                'id'       => 'color-top_bar_background_color',
                'type'     => 'color',
                'output'   => array( '.site-title' ),
                'title'    => esc_html__( 'Background', 'logancee' ),
                'default'  => '',
            ),
            array(
                'id'       => 'color-top_bar_text_color',
                'type'     => 'color',
                'output'   => array( '.site-title' ),
                'title'    => esc_html__( 'Text', 'logancee' ),
                'default'  => '',
            ),
            array(
                'id'       => 'color-top_bar_links_color',
                'type'     => 'color',
                'output'   => array( '.site-title' ),
                'title'    => esc_html__( 'Links', 'logancee' ),
                'default'  => '',
            ),
            array(
                'id'       => 'color-top_bar_links_hover_color',
                'type'     => 'color',
                'output'   => array( '.site-title' ),
                'title'    => esc_html__( 'Links hover', 'logancee' ),
                'default'  => '',
            ),
            array(
                'id'     => 'color-top_bar-section-end',
                'type'   => 'section',
                'indent' => false, // Indent all options below until the next 'section' option is set.
            ),


            array(
                'id'       => 'color-breadcrumb-section-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Breadcrumb', 'logancee' ),
                'indent'   => true, // Indent all options below until the next 'section' option is set.
            ),
            array(
                'id'       => 'color-breadcrumb_text_color',
                'type'     => 'color',
                'output'   => array( '.site-title' ),
                'title'    => esc_html__( 'Text color', 'logancee' ),
                'default'  => '',
            ),
            array(
                'id'     => 'color-breadcrumb-section-end',
                'type'   => 'section',
                'indent' => false, // Indent all options below until the next 'section' option is set.
            ),

            array(
                'id'       => 'color-top_search-section-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Top', 'logancee' ),
                'indent'   => true, // Indent all options below until the next 'section' option is set.
            ),
            array(
                'id'       => 'color-top_search_color',
                'type'     => 'color',
                'output'   => array( '.site-title' ),
                'title'    => esc_html__( 'Icon search color', 'logancee' ),
                'default'  => '',
            ),
            array(
                'id'     => 'color-top_search-section-end',
                'type'   => 'section',
                'indent' => false, // Indent all options below until the next 'section' option is set.
            ),

            array(
                'id'       => 'color-top_search-section-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Top -> Search', 'logancee' ),
                'indent'   => true, // Indent all options below until the next 'section' option is set.
            ),
            array(
                'id'       => 'color-top_search_color',
                'type'     => 'color',
                'output'   => array( '.site-title' ),
                'title'    => esc_html__( 'Icon search color', 'logancee' ),
                'default'  => '',
            ),
            array(
                'id'     => 'color-top_search-section-end',
                'type'   => 'section',
                'indent' => false, // Indent all options below until the next 'section' option is set.
            ),

            array(
                'id'       => 'color-top_cart-section-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Top -> Cart Block', 'logancee' ),
                'indent'   => true, // Indent all options below until the next 'section' option is set.
            ),
            array(
                'id'       => 'color-top_cart_count_background',
                'type'     => 'color',
                'output'   => array( '.site-title' ),
                'title'    => esc_html__( 'Count text background color', 'logancee' ),
                'default'  => '',
            ),
            array(
                'id'       => 'color-top_cart_count_color',
                'type'     => 'color',
                'output'   => array( '.site-title' ),
                'title'    => esc_html__( 'Count text color', 'logancee' ),
                'default'  => '',
            ),
            array(
                'id'       => 'color-top_cart_icon_color',
                'type'     => 'color',
                'output'   => array( '.site-title' ),
                'title'    => esc_html__( 'Icon color', 'logancee' ),
                'default'  => '',
            ),
            array(
                'id'       => 'color-top_cart_icon_hover_color',
                'type'     => 'color',
                'output'   => array( '.site-title' ),
                'title'    => esc_html__( 'Icon hover color', 'logancee' ),
                'default'  => '',
            ),
            array(
                'id'     => 'color-top_cart-section-end',
                'type'   => 'section',
                'indent' => false, // Indent all options below until the next 'section' option is set.
            ),



            array(
                'id'       => 'color-top_settings-section-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Top -> Settings', 'logancee' ),
                'indent'   => true, // Indent all options below until the next 'section' option is set.
            ),
            array(
                'id'       => 'color-top_settings_icon_color',
                'type'     => 'color',
                'output'   => array( '.site-title' ),
                'title'    => esc_html__( 'Icon settings color', 'logancee' ),
                'default'  => '',
            ),
            array(
                'id'       => 'color-top_settings_icon_hover_color',
                'type'     => 'color',
                'output'   => array( '.site-title' ),
                'title'    => esc_html__( 'Icon settings hover color', 'logancee' ),
                'default'  => '',
            ),
            array(
                'id'     => 'color-top_settings-section-end',
                'type'   => 'section',
                'indent' => false, // Indent all options below until the next 'section' option is set.
            ),



            array(
                'id'       => 'color-menu-section-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Menu', 'logancee' ),
                'indent'   => true, // Indent all options below until the next 'section' option is set.
            ),
            array(
                'id'       => 'color-menu_links_color',
                'type'     => 'color',
                'output'   => array( '.site-title' ),
                'title'    => esc_html__( 'Links color', 'logancee' ),
                'default'  => '',
            ),
            array(
                'id'       => 'color-menu_links_hover_color',
                'type'     => 'color',
                'output'   => array( '.site-title' ),
                'title'    => esc_html__( 'Links hover color', 'logancee' ),
                'default'  => '',
            ),
            array(
                'id'     => 'color-menu-section-end',
                'type'   => 'section',
                'indent' => false, // Indent all options below until the next 'section' option is set.
            ),
            
            array(
                'id'       => 'color-customfooter-section-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Custom Footer', 'logancee' ),
                'indent'   => true, // Indent all options below until the next 'section' option is set.
            ),
            array(
                'id'       => 'color-customfooter_color_text',
                'type'     => 'color',
                'output'   => array( '.site-title' ),
                'title'    => esc_html__( 'Text', 'logancee' ),
                'default'  => '',
            ),
            array(
                'id'       => 'color-customfooter_color_heading',
                'type'     => 'color',
                'output'   => array( '.site-title' ),
                'title'    => esc_html__( 'Heading', 'logancee' ),
                'default'  => '',
            ),
            array(
                'id'       => 'color-customfooter_color_icon_heading',
                'type'     => 'color',
                'output'   => array( '.site-title' ),
                'title'    => esc_html__( 'Icon heading', 'logancee' ),
                'default'  => '',
            ),
            array(
                'id'       => 'color-customfooter_color_icon_contact_us',
                'type'     => 'color',
                'output'   => array( '.site-title' ),
                'title'    => esc_html__( 'Icon contact us', 'logancee' ),
                'default'  => '',
            ),
            array(
                'id'       => 'color-customfooter_border_color',
                'type'     => 'color',
                'output'   => array( '.site-title' ),
                'title'    => esc_html__( 'Border', 'logancee' ),
                'default'  => '',
            ),
            array(
                'id'       => 'color-customfooter_background_color',
                'type'     => 'color',
                'output'   => array( '.site-title' ),
                'title'    => esc_html__( 'Background', 'logancee' ),
                'default'  => '',
            ),
           
             array(
                'id'     => 'color-customfooter-section-end',
                'type'   => 'section',
                'indent' => false, // Indent all options below until the next 'section' option is set.
            ),
            

        ),
    ) );


Redux::setSection( $opt_name, array(
    'title'      => esc_html__( 'Backgrounds', 'logancee' ),
    'id'         => 'design-background',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'background-status',
            'type'     => 'switch',
            'title'    => esc_html__( 'Status', 'logancee' ),
            'subtitle' => esc_html__( 'Enable/disable custom backgrounds ', 'logancee' ),
            'default'  => false,
        ),
        array(
            'id'       => 'background-body-section-start',
            'type'     => 'section',
            'title'    => esc_html__( 'Body', 'logancee' ),
            'indent'   => true, // Indent all options below until the next 'section' option is set.
        ),

        array(
            'id'=>'background-body_background_background',
            'type' => 'select',
            'title' => 'Bckground type',
            'options' => array(
                '0'       => 'Standard',
                '1'       => 'None',
                '2'       => 'Own',
                '3'       => 'Subtle',
            ),
            'default' => '0',
        ),
        array(
            'id'       => 'background-body_background_subtle_patterns',
            'type'     => 'image_select',
            'tiles'    => true,
            'title'    => esc_html__( 'Subtle patterns', 'logancee' ),
            'default'  => 0,
            'options'   => $patterns
        ,
        ),
        array(
            'id'       => 'background-body_background',
            'type'     => 'background',
            'output'   => array( 'body' ),
            'title'    => esc_html__( 'Own background', 'logancee' ),
        ),
        array(
            'id'     => 'background-body-section-end',
            'type'   => 'section',
            'indent' => false, // Indent all options below until the next 'section' option is set.
        ),


        array(
            'id'       => 'background-header-section-start',
            'type'     => 'section',
            'title'    => esc_html__( 'Header', 'logancee' ),
            'indent'   => true, // Indent all options below until the next 'section' option is set.
        ),

        array(
            'id'=>'background-header_background_background',
            'type' => 'select',
            'title' => 'Bckground type',
            'options' => array(
                '0'       => 'Standard',
                '1'       => 'None',
                '2'       => 'Own',
                '3'       => 'Subtle',
            ),
            'default' => '0',
        ),
        array(
            'id'       => 'background-header_background_subtle_patterns',
            'type'     => 'image_select',
            'tiles'    => true,
            'title'    => esc_html__( 'Subtle patterns', 'logancee' ),
            'default'  => 0,
            'options'   => $patterns
        ,
        ),
        array(
            'id'       => 'background-header_background',
            'type'     => 'background',
            'output'   => array( 'body' ),
            'title'    => esc_html__( 'Own background', 'logancee' ),
        ),
        array(
            'id'     => 'background-header-section-end',
            'type'   => 'section',
            'indent' => false, // Indent all options below until the next 'section' option is set.
        ),


        array(
            'id'       => 'background-customfooter-section-start',
            'type'     => 'section',
            'title'    => esc_html__( 'Custom Footer', 'logancee' ),
            'indent'   => true, // Indent all options below until the next 'section' option is set.
        ),

        array(
            'id'=>'background-customfooter_background_background',
            'type' => 'select',
            'title' => 'Bckground type',
            'options' => array(
                '0'       => 'Standard',
                '1'       => 'None',
                '2'       => 'Own',
                '3'       => 'Subtle',
            ),
            'default' => '0',
        ),
        array(
            'id'       => 'background-customfooter_background_subtle_patterns',
            'type'     => 'image_select',
            'tiles'    => true,
            'title'    => esc_html__( 'Subtle patterns', 'logancee' ),
            'default'  => 0,
            'options'   => $patterns
        ,
        ),
        array(
            'id'       => 'background-customfooter_background',
            'type'     => 'background',
            'output'   => array( 'body' ),
            'title'    => esc_html__( 'Own background', 'logancee' ),
        ),
        array(
            'id'     => 'background-customfooter-section-end',
            'type'   => 'section',
            'indent' => false, // Indent all options below until the next 'section' option is set.
        ),


        array(
            'id'       => 'background-content_headlines-section-start',
            'type'     => 'section',
            'title'    => esc_html__( 'Content headlines', 'logancee' ),
            'indent'   => true, // Indent all options below until the next 'section' option is set.
        ),

        array(
            'id'=>'background-content_headlines_background_background',
            'type' => 'select',
            'title' => 'Bckground type',
            'options' => array(
                '0'       => 'Standard',
                '1'       => 'None',
                '2'       => 'Own',
                '3'       => 'Subtle',
            ),
            'default' => '0',
        ),
        array(
            'id'       => 'background-content_headlines_background',
            'type'     => 'background',
            'output'   => array( 'body' ),
            'title'    => esc_html__( 'Own background', 'logancee' ),
        ),
        array(
            'id'     => 'background-content_headlines-section-end',
            'type'   => 'section',
            'indent' => false, // Indent all options below until the next 'section' option is set.
        ),


        array(
            'id'       => 'background-footer_headlines-section-start',
            'type'     => 'section',
            'title'    => esc_html__( 'Footer headlines', 'logancee' ),
            'indent'   => true, // Indent all options below until the next 'section' option is set.
        ),

        array(
            'id'=>'background-footer_headlines_background_background',
            'type' => 'select',
            'title' => 'Bckground type',
            'options' => array(
                '0'       => 'Standard',
                '1'       => 'None',
                '2'       => 'Own',
                '3'       => 'Subtle',
            ),
            'default' => '0',
        ),
        array(
            'id'       => 'background-footer_headlines_background',
            'type'     => 'background',
            'output'   => array( 'body' ),
            'title'    => esc_html__( 'Own background', 'logancee' ),
        ),
        array(
            'id'     => 'background-footer_headlines-section-end',
            'type'   => 'section',
            'indent' => false, // Indent all options below until the next 'section' option is set.
        ),
    )
));

        // -> START Custom code
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Custom code', 'logancee' ),
        'id'               => 'custom-code',
        'customizer_width' => '500px',
        'icon'             => 'el el-edit',
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'CSS', 'logancee' ),
        'id'         => 'custom-code-css',
        //'icon'  => 'el el-home'
        'desc'       => esc_html__( 'Custom CSS code', 'logancee'),
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'css-status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Status', 'logancee' ),
                'subtitle' => esc_html__( 'Enable/disable custom css ', 'logancee' ),
                'default'  => true,
            ),
            array(
                'id'       => 'css-value',
                'type'     => 'ace_editor',
                'title'    => esc_html__( 'CSS Code', 'logancee' ),
                'subtitle' => esc_html__( 'Paste your CSS code here.', 'logancee' ),
                'mode'     => 'css',
                'theme'    => 'monokai',
                'desc'     => 'Possible modes can be found at <a href="' . 'http://' . 'ace.c9.io" target="_blank">' . 'http://' . 'ace.c9.io/</a>.',
                'default'  => "#header{\n   margin: 0 auto;\n}"
            ),
        )
    ) );
    

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'JS', 'logancee' ),
        'id'         => 'custom-code-js',
        //'icon'  => 'el el-home'
        'desc'       => esc_html__( 'Custom JS code', 'logancee'),
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'js-status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Status', 'logancee' ),
                'subtitle' => esc_html__( 'Enable/disable custom js ', 'logancee' ),
                'default'  => true,
            ),

            array(
                'id'       => 'js-value',
                'type'     => 'ace_editor',
                'title'    => esc_html__( 'JS Code', 'logancee' ),
                'subtitle' => esc_html__( 'Paste your JS code here.', 'logancee' ),
                'mode'     => 'javascript',
                'theme'    => 'chrome',
                'desc'     => 'Possible modes can be found at <a href="' . 'http://' . 'ace.c9.io" target="_blank">' . 'http://' . 'ace.c9.io/</a>.',
                'default'  => "jQuery(document).ready(function(){\n\n});"
            ),

        )
    ) );
    
     
    
    // -> START Custom Block
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Custom block', 'logancee' ),
        'id'               => 'custom-block',
        'customizer_width' => '500px',
        'icon'             => 'el el-pause',
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Popup', 'logancee' ),
        'id'         => 'block-popup',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'block-popup-status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Status', 'logancee' ),
                'default'  => false,
            ),
            array(
                'id'       => 'block-popup-width',
                'type'     => 'text',
                'title'    => esc_html__( 'Popup width', 'logancee' ),
                'default'  => '750px',
            ),
            array(
                'id'       => 'block-popup-showonlyonce',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show only once', 'logancee' ),
                'default'  => false,
            ),
            array(
                'id'       => 'block-popup-only-homepage',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show on homepage only', 'logancee' ),
                'default'  => true,
            ),

            array(
                'id'       => 'block-popup-custom_block',
                'type'     => 'text',
                'title'    => esc_html__('Custom block name', 'logancee'),
                'subtitle'         => esc_html__('Use custom block in popup', 'logancee'),
            ),
            array(
                'id'               => 'block-popup-content',
                'type'             => 'editor',
                'title'            => esc_html__('Content', 'logancee'),
                'subtitle'         => esc_html__('Popup content', 'logancee'),
                'args'   => array(
                    'teeny'            => true,
                    'textarea_rows'    => 20
                )
            )

        )
    ) );
    
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Header top bar', 'logancee' ),
        'id'         => 'block-contact',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'block-header-top-bar-status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Status', 'logancee' ),
                'default'  => false,
            ),
            array(
                'id'               => 'block-header-top-bar-content',
                'type'             => 'editor',
                'title'            => esc_html__('Content', 'logancee'), 
                'subtitle'         => esc_html__('Header top bar text', 'logancee'),
                'args'   => array(
                    'teeny'            => true,
                    'textarea_rows'    => 20
                )
            )

        )
    ) );
    
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Product page', 'logancee' ),
        'id'         => 'block-product',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'block-product-status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Status', 'logancee' ),
                'default'  => false,
            ),
            array(
                'id'       => 'block-product-heading',
                'type'     => 'text',
                'title'    => esc_html__( 'Heading', 'logancee' ),
                'default'  => '',
            ),
            array(
                'id'               => 'block-product-content',
                'type'             => 'editor',
                'title'            => esc_html__('Content', 'logancee'), 
                'subtitle'         => esc_html__('Product page content', 'logancee'),
                'args'   => array(
                    'teeny'            => true,
                    'textarea_rows'    => 20
                )
            )

        )
    ) );
    
    // -> START Custom Footer
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Custom footer', 'logancee' ),
        'id'               => 'custom-footer',
        'customizer_width' => '500px',
        'icon'             => 'el el-inbox',
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Contact', 'logancee' ),
        'id'         => 'footer-contact',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'footer-contact-status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Status', 'logancee' ),
                'subtitle' => esc_html__( 'Enable/disable contact block ', 'logancee' ),
                'default'  => true,
            ),
            array(
                'id'       => 'footer-contact-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Title', 'logancee' ),
                'subtitle' => esc_html__( 'Contact section title', 'logancee' ),
                'default'  => '',
            ),
            array(
                'id'       => 'footer-contact-phone',
                'type'     => 'text',
                'title'    => esc_html__( 'Phone', 'logancee' ),
                'subtitle' => esc_html__( 'Contact section phone', 'logancee' ),
                'default'  => '',
            ),
            array(
                'id'       => 'footer-contact-phone2',
                'type'     => 'text',
                'title'    => esc_html__( 'Phone 2', 'logancee' ),
                'subtitle' => esc_html__( 'Contact section phone 2', 'logancee' ),
                'default'  => '',
            ),
            array(
                'id'       => 'footer-contact-skype',
                'type'     => 'text',
                'title'    => esc_html__( 'Skype', 'logancee' ),
                'subtitle' => esc_html__( 'Contact section skype', 'logancee' ),
                'default'  => '',
            ),
            array(
                'id'       => 'footer-contact-skype2',
                'type'     => 'text',
                'title'    => esc_html__( 'Skype 2', 'logancee' ),
                'subtitle' => esc_html__( 'Contact section skype 2', 'logancee' ),
                'default'  => '',
            ),
            
            array(
                'id'       => 'footer-contact-email',
                'type'     => 'text',
                'title'    => esc_html__( 'Email', 'logancee' ),
                'subtitle' => esc_html__( 'Contact section email', 'logancee' ),
                'default'  => '',
            ),
            
            array(
                'id'       => 'footer-contact-email2',
                'type'     => 'text',
                'title'    => esc_html__( 'Email 2', 'logancee' ),
                'subtitle' => esc_html__( 'Contact section email2', 'logancee' ),
                'default'  => '',
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'About us', 'logancee' ),
        'id'         => 'footer-aboutus',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'footer-aboutus-status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Status', 'logancee' ),
                'subtitle' => esc_html__( 'Enable/disable about us block ', 'logancee' ),
                'default'  => false,
            ),
            array(
                'id'       => 'footer-aboutus-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Title', 'logancee' ),
                'subtitle' => esc_html__( 'About us section title', 'logancee' ),
                'default'  => '',
            ),
            array(
                'id'               => 'footer-aboutus-content',
                'type'             => 'editor',
                'title'            => esc_html__('Content', 'logancee'), 
                'subtitle'         => esc_html__('About us section content', 'logancee'),
                'args'   => array(
                    'teeny'            => true,
                    'textarea_rows'    => 20
                )
            )

        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Facebook', 'logancee' ),
        'id'         => 'footer-facebook',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'footer-facebook-status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Status', 'logancee' ),
                'subtitle' => esc_html__( 'Enable/disable facebook block ', 'logancee' ),
                'default'  => false,
            ),
            array(
                'id'       => 'footer-facebook-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Title', 'logancee' ),
                'subtitle' => esc_html__( 'Facebook section title', 'logancee' ),
                'default'  => '',
            ),
            array(
                'id'       => 'footer-facebook-id',
                'type'     => 'text',
                'title'    => esc_html__( 'Facebook ID', 'logancee' ),
                'default'  => '',
            ),
            array(
                'id'       => 'footer-facebook-showfaces',
                'type'     => 'switch',
                'title'    => esc_html__( 'Status', 'logancee' ),
                'subtitle' => esc_html__( 'Enable/disable display faces ', 'logancee' ),
                'default'  => true,
            ),
            array(
                'id'       => 'footer-facebook-facescount',
                'type'     => 'text',
                'title'    => esc_html__( 'Number of faces', 'logancee' ),
                'default'  => '',
            ),
            array(
                'id'       => 'footer-facebook-height',
                'type'     => 'text',
                'title'    => esc_html__( 'Height', 'logancee' ),
                'subtitle'    => esc_html__( 'Facebook block height in px', 'logancee' ),
                'default'  => '',
            ),
            array(
                'id'=>'footer-facebook-colorscheme',
                'type' => 'select',
                'title' => 'Theme skin',
                'title' => 'Select color of scheme',
                'options' => array(
                    '0'       => 'Light',
                    '1'       => 'Dark',
                ),
                'default' => '0',
            ),

        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Twitter', 'logancee' ),
        'id'         => 'footer-twitter',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'footer-twitter-status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Status', 'logancee' ),
                'subtitle' => esc_html__( 'Enable/disable twitter block ', 'logancee' ),
                'default'  => false,
            ),
            array(
                'id'       => 'footer-twitter-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Title', 'logancee' ),
                'subtitle' => esc_html__( 'Twitter section title', 'logancee' ),
                'default'  => '',
            ),
            array(
                'id'       => 'footer-twitter-id',
                'type'     => 'text',
                'title'    => esc_html__( 'Twitter username', 'logancee' ),
                'default'  => '',
            ),
            array(
                'id'       => 'footer-twitter-limit',
                'type'     => 'text',
                'title'    => esc_html__( 'Limit', 'logancee' ),
                'default'  => '2',
            ),

        )
    ) );
    

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Custom block', 'logancee' ),
        'id'         => 'footer-customblock',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'footer-customblock-status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Status', 'logancee' ),
                'subtitle' => esc_html__( 'Enable/disable custom block ', 'logancee' ),
                'default'  => false,
            ),
            array(
                'id'       => 'footer-customblock-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Title', 'logancee' ),
                'subtitle' => esc_html__( 'Custom section title', 'logancee' ),
                'default'  => '',
            ),
            array(
                'id'               => 'footer-customblock-content',
                'type'             => 'editor',
                'title'            => esc_html__('Content', 'logancee'), 
                'subtitle'         => esc_html__('Custom section content', 'logancee'),
                'args'   => array(
                    'teeny'            => true,
                    'textarea_rows'    => 20
                )
            )

        )
    ) );
    
        
 // -> START Footer
                
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Footer', 'logancee' ),
        'id'               => 'footer',
        'customizer_width' => '500px',
        'icon'             => 'el el-photo',
    ) );

    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Payments', 'logancee' ),
        'id'    => 'footer-payments',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'payment-status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Status', 'logancee' ),
                'default'  => false,
            ),
            array(
                'id'          => 'payment',
                'type'        => 'slides',
                'title'       => esc_html__( 'Payment options', 'logancee' ),
                'placeholder' => array(
                    'title'       => esc_html__( 'Name', 'logancee' ),
                    'url'         => esc_html__( 'Link', 'logancee' ),
                ),
            ),
        )
    ) );

   

    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Copyright', 'logancee' ),
        'id'    => 'footer-copyright',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'               => 'footer-copyright-content',
                'type'             => 'editor',
                'title'            => esc_html__('Content', 'logancee'), 
                'subtitle'         => esc_html__('Cpyright block content', 'logancee'),
                'args'   => array(
                    'teeny'            => true,
                    'textarea_rows'    => 20
                )
            )
        )
    ) );

   
 
    
            
    // -> START Widgets
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Widgets', 'logancee' ),
        'id'               => 'widget',
        'customizer_width' => '500px',
        'icon'             => 'el el-puzzle',
    ) );


    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Facebook', 'logancee' ),
        'id'         => 'widget-facebook',
        'subsection' => true,
        'fields'     => array(          
            array(
                'id'       => 'widget-facebook-status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Status', 'logancee' ),
                'subtitle' => esc_html__( 'Enable/disable facebook widget ', 'logancee' ),
                'default'  => false,
            ),

            array(
                'id'       => 'widget-facebook-id',
                'type'     => 'text',
                'title'    => esc_html__( 'Facebook ID', 'logancee' ),
                'default'  => '',
            ),

            array(
                'id'=>'widget-facebook-position',
                'type' => 'select',
                'title' => 'Position',
                'options' => array(
                    '0'       => 'Right',
                    '1'       => 'Left',
                ),
                'default' => '0',
            ),

        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Twitter', 'logancee' ),
        'id'         => 'widget-twitter',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'widget-twitter-status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Status', 'logancee' ),
                'subtitle' => esc_html__( 'Enable/disable twitter widget ', 'logancee' ),
                'default'  => false,
            ),
            array(
                'id'       => 'widget-twitter-username',
                'type'     => 'text',
                'title'    => esc_html__( 'Username', 'logancee' ),
                'subtitle' => esc_html__( 'Twitter username', 'logancee' ),
                'default'  => '',
            ),
            array(
                'id'       => 'widget-twitter-id',
                'type'     => 'text',
                'title'    => esc_html__( 'Twitter ID', 'logancee' ),
                'default'  => '',
            ),
            
            array(
                'id'=>'widget-twitter-limit',
                'type' => 'select',
                'title' => 'Tweets limit',
                'options' => array(
                    '1'       => '1',
                    '2'       => '2',
                    '3'       => '3',
                ),
                'default' => '3',
            ),
            
            array(
                'id'=>'widget-twitter-position',
                'type' => 'select',
                'title' => 'Position',
                'options' => array(
                    '0'       => 'Right',
                    '1'       => 'Left',
                ),
                'default' => '0',
            ),

        )
    ) );
 

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Custom', 'logancee' ),
        'id'         => 'widget-custom',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'widget-custom-status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Status', 'logancee' ),
                'subtitle' => esc_html__( 'Enable/disable custom widget ', 'logancee' ),
                'default'  => false,
            ),
            array(
                'id'               => 'widget-custom-content',
                'type'             => 'editor',
                'title'            => esc_html__('Content', 'logancee'), 
                'subtitle'         => esc_html__('Custom section content', 'logancee'),
                'args'   => array(
                    'teeny'            => true,
                    'textarea_rows'    => 20
                )
            ),
            array(
                'id'=>'widget-custom-position',
                'type' => 'select',
                'title' => 'Position',
                'options' => array(
                    '0'       => 'Right',
                    '1'       => 'Left',
                ),
                'default' => '0',
            ),

            )
    ) );
       
    
    if(in_array(logancee_get_active_skin(), logancee_get_core_skins())){

    // -> START Sample data

       Redux::setSection( $opt_name, array(
           'title'            => esc_html__( 'Sample data', 'logancee' ),
           'id'               => 'sample_data',
           'customizer_width' => '500px',
           'icon'             => 'el el-refresh',
       ) );

       Redux::setSection( $opt_name, array(
           'title' => esc_html__( 'Import', 'logancee' ),
           'id'    => 'sample_data-import',
           'subsection' => true,
           'fields'     => array(

               array(
                   'id'        => '17',
                   'title' => esc_html__( 'Import sample data for this skin', 'logancee' ),
                   'subtitle' => esc_html__( '* Remember to deactivate Wordpress Importer plugin when you import sample data', 'logancee' ),
                   'type'      => 'raw',
                   'markdown'  => true,
                   'content'   => (isset($_GET['import_success'])? ($_GET['import_success'] == 'true' ? '<strong style="color:green">Successfully Imported!</strong><br/><br/>':'<strong style="color:red">Something went wrong!</strong><br> Remember to deactivate Wordpress Importer plugin when you import sample data<br><br>') : '').'<a href="'.admin_url('admin.php?page=logancee_options_options').'&import_sample_content=true" class="button button-primary">'.'Import'.'</a>'
               )
           )
       ) );
    }
   
    /*
     * <--- END SECTIONS
     */

