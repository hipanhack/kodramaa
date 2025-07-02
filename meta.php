<?php
add_filter( 'rwmb_meta_boxes', 'your_prefix_register_meta_boxes' );
function your_prefix_register_meta_boxes( $meta_boxes )
{
	$prefix = 'ero_';
	$meta_boxes[] = array(
		'id' => 'autogenerateimgcat',
		'title' => __( 'Automatic', 'meta-box' ),
	        'pages' => array( 'anime' ),
	        'context' => 'normal',
		'priority' => 'high',
		'autosave' => false,
		'fields' => array(
			array(
				
				'id'   => "{$prefix}autogenerateimgcat",
				'desc'  => __( 'Auto Create Featured Image and Category', 'meta-box' ),
				'type' => 'checkbox',
				'std' => 1,
			)
		)
	);
	$meta_boxes[] = array(
		'id' => 'series',
		'title' => __( 'Series Info', 'meta-box' ),
		'pages' => array( 'anime' ),
		'context' => 'normal',
		'priority' => 'high',
		'autosave' => true,
		'fields' => array(
			array(
                'name'  => __( 'Image', 'meta-box' ),
                'id'    => "{$prefix}image",
                'type'  => 'text',
            ),
			array(
                'name'  => __( 'Big Cover', 'meta-box' ),
                'id'    => "{$prefix}cover",
                'type'  => 'image_advanced',
				'max_file_uploads' => '1'
            ),
			array(
				'name'     => __( 'Subbed?', 'meta-box' ),
				'id'       => "{$prefix}sub",
				'type'     => 'select',
				'options'  => array(
					'Sub' => __( 'Sub', 'meta-box' ),
					'Dub' => __( 'Dub', 'meta-box' ),
					'RAW' => __( 'RAW', 'meta-box' ),
				),
				'multiple'    => false,
				'std'         => 'Sub',
			),
			array(
				'name'     => __( 'Mature Content?', 'meta-box' ),
				'id'       => "{$prefix}mature",
				'type'     => 'select',
				'options'  => array(
					'No' => __( 'No', 'meta-box' ),
					'Yes' => __( 'Yes', 'meta-box' ),
				),
				'multiple'    => false,
				'std'         => 'No',
			),
			array(
				'name'     => __( 'Hot?', 'meta-box' ),
				'id'       => "{$prefix}hot",
				'type'     => 'select',
				'options'  => array(
					'No' => __( 'No', 'meta-box' ),
					'Yes' => __( 'Yes', 'meta-box' ),
				),
				'multiple'    => false,
				'std'         => 'No',
			),
			array(
				'name'  => __( 'Japanese', 'meta-box' ),
				'id'    => "{$prefix}japanese",
				'desc'  => __( 'Input Japanese Title', 'meta-box' ),
				'type'  => 'text',
			),
			array(
				'name'     => __( 'Status', 'meta-box' ),
				'id'       => "{$prefix}status",
				'type'     => 'select',
				'options'  => array(
					'Ongoing' => __( 'Ongoing', 'meta-box' ),
					'Completed' => __( 'Completed', 'meta-box' ),
					'Upcoming' => __( 'Upcoming', 'meta-box' ),
					'Hiatus' => __( 'Hiatus', 'meta-box' ),
				),
				'multiple'    => false,
				'std'         => 'Ongoing',
			),
			array(
                'name' => __('Censor', 'meta-box'),
                'id' => "{$prefix}censor",
                'type' => 'select',
                'options' => array(
                    'Censored' => __('Censored', 'meta-box'),
                    'Uncensored' => __('Uncensored', 'meta-box'),
                ),
                'multiple' => false,
                'std' => 'Censored'
            ),
			array(
				'name'     => __( 'Type', 'meta-box' ),
				'id'       => "{$prefix}type",
				'type'     => 'select',
				'options'  => array(
					'TV' => __( 'TV', 'meta-box' ),
					'OVA' => __( 'OVA', 'meta-box' ),
					'Movie' => __( 'Movie', 'meta-box' ),
					'Live Action' => __( 'Live Action', 'meta-box' ),
					'Special' => __( 'Special', 'meta-box' ),
					'BD' => __( 'BD', 'meta-box' ),
					'ONA' => __( 'ONA', 'meta-box' ),
					'Music' => __( 'Music', 'meta-box' ),
				),
				'multiple'    => false,
				'std'         => 'TV',
			),
			array(
				'name'  => __( 'Duration', 'meta-box' ),
				'id'    => "{$prefix}durasi",
				'desc'  => __( 'Input duration episode', 'meta-box' ),
				'type'  => 'text',
			),
			array(
				'name'  => __( 'Score Anime', 'meta-box' ),
				'id'    => "{$prefix}skor",
				'desc'  => __( 'input series score', 'meta-box' ),
				'type'  => 'text',
			),
			array(
				'name' => __( 'Release Date', 'meta-box' ),
				'id'   => "{$prefix}tayang",
				'desc'  => __( 'input release date', 'meta-box' ),
				'type' => 'date',

				'js_options' => array(
					'appendText'      => __( '(M dd, yyyy)', 'meta-box' ),
					'dateFormat'      => __( 'M dd, yy', 'meta-box' ),
					'changeMonth'     => true,
					'changeYear'      => true,
					'showButtonPanel' => true,
				),
			),
			array(
				'name' => __( 'Total Episode', 'meta-box' ),
				'id'   => "{$prefix}episode",
				'desc'  => __( 'input total episode series', 'meta-box' ),
				'type' => 'number',

				'min'  => 0,
				'step' => 1,
			),
			array(
                'name' => __('Trailer', 'meta-box'),
                'id' => "{$prefix}trailer",
                'desc' => __('input trailer ID from youtube,<br/>example: youtube.com/watch?v=DO3rIz7aExU => ID "<b>DO3rIz7aExU</b>"', 'meta-box'),
                'type' => 'text'
            ),
			array(
				'name'  => __( 'Fansub', 'meta-box' ),
				'id'    => "{$prefix}fansub",
				'type'  => 'text',
			),
         )
			
	);
	$meta_boxes[] = array(
		'id' => 'galleryarea',
		'title' => __( 'Gallery', 'meta-box' ),
	        'pages' => array( 'anime' ),
	        'context' => 'normal',
		'fields' => array(
			array(
				'name' => __( 'Upload', 'meta-box' ),
				'id'   => "{$prefix}gallery",
				'type' => 'image_advanced',
				'force_delete' => false,
				'image_size' => 'thumbnail',
			),
		)
	);
	$meta_boxes[] = array(
		'id' => 'episode',
		'title' => __( 'Episode', 'meta-box' ),
	        'pages' => array( 'post' ),
	        'context' => 'normal',
		'priority' => 'high',
		'autosave' => true,
		'fields' => array(
			array(
				'name'     => __( 'Subbed?', 'meta-box' ),
				'id'       => "{$prefix}subepisode",
				'type'     => 'select',
				'options'  => array(
					'None' => __( 'None', 'meta-box' ),
					'Sub' => __( 'Sub', 'meta-box' ),
					'Dub' => __( 'Dub', 'meta-box' ),
					'RAW' => __( 'RAW', 'meta-box' ),
				),
				'multiple'    => false,
				'std'         => 'None',
			),
			array(
				'name' => __( 'Episode Number', 'meta-box' ),
				'id'   => "{$prefix}episodebaru",
				'desc'  => __( 'Input episode number / if type movie just write Movie', 'meta-box' ),
				'type' => 'text',
			),
			array(
				'name' => __( 'Episode Title', 'meta-box' ),
				'id'   => "{$prefix}episodetitle",
				'type' => 'text',
			),
			array(
                'name' => __('Download Link', 'meta-box'),
                'id' => "{$prefix}download",
                'desc' => __('Download Link', 'meta-box'),
                'type' => 'url'
            ),
			array(
				'name'    => __( 'Series', 'meta-box' ),
				'id'      => "{$prefix}seri",
				'type'    => 'post',
				'post_type' => 'anime',
				'field_type' => 'select_advanced',
				'query_args' => array(
					'post_status'    => 'publish',
					'posts_per_page' => - 1,
					'orderby' => 'title',
					'order' => 'ASC',
				)
			),
		)
	);
	$meta_boxes[] = array(
        'title'  => 'Embed Video',
		'pages' => array( 'post' ),
		'tabs'      => array(
            'input-version' => array(
                'label' => 'Input Version',
                'icon'  => 'dashicons-admin-customizer',
            ),
            'sc-version'  => array(
                'label' => 'Shortcode Version',
                'icon'  => 'dashicons-editor-code',
            ),
        ),
		'tab_style' => 'default',
        'fields' => array(
            array(
                'id'     => 'ab_embedgroup',
                'type'   => 'group',
                'clone'  => true,
				'sort_clone'  => true,
				'save_state' => true,
				'desc' => '<b style="color:red;">You can insert embed code or shortcode</b>',
				'tab'  => 'input-version',
                'fields' => array(
                    array(
                        'name'  => 'Host Name',
                        'id'    => 'ab_hostname',
                        'type'  => 'text',
                    ),
                    array(
                        'name'   => 'Embed',
                        'id'     => 'ab_embed',
                        'type'   => 'textarea',
						'sanitize_callback' => 'none',
                    ),
                ), //episode
            ), //input-version
			array(
                'name'  => __( 'Shortcode Video', 'meta-box' ),
                'id'    => "{$prefix}embed",
                'type'  => 'textarea',
				'clone' => true,
				'sort_clone'  => true,
				'sanitize_callback' => 'none',
				'tab' => 'sc-version',
            ),
        ),
    );
	$meta_boxes[] = array(
        'title'  => 'Download',
		'pages' => array( 'post' ),
        'fields' => array(
            array(
                'id'     => 'ab_downloadgroup',
                'type'   => 'group',
				'clone'  => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => '{ab_eptitle}',
				'save_state' => true,
                'fields' => array(
                    array(
                        'name'  => 'Episode Title',
                        'id'    => 'ab_eptitle',
                        'type'  => 'text',
                    ),
                    array(
                        'name'   => 'Resolution',
                        'id'     => 'ab_resolution',
                        'type'   => 'group',
                        'clone'  => true,
						'sort_clone'  => true,
						'collapsible' => true,
						'group_title' => '{ab_pixel}',
                        'fields' => array(
                            array(
                                'name'  => 'Pixel',
                                'id'    => 'ab_pixel',
                                'type'  => 'text',
                            ),
							array(
								'name'   => 'Download Link',
								'id'     => 'ab_downloadlink',
								'type'   => 'group',
								'clone'  => true,
								'sort_clone'  => true,
								'fields' => array(
									// Normal field (cloned)
									array(
										'name'  => 'Hosting Name',
										'id'    => 'ab_hostingname',
										'type'  => 'text',
									),
									array(
										'name'  => 'URL',
										'id'    => 'ab_linkurl',
										'type'  => 'text',
									),
								),
							),
                        ), //pixel
                    ),
                ), //episode
            ), //input-version
        ),
    );
	$meta_boxes[] = array(
        'title'  => 'Download',
		'pages' => array( 'anime' ),
		'tabs'      => array(
            'input-version' => array(
                'label' => 'Input Version',
                'icon'  => 'dashicons-admin-customizer',
            ),
            'sc-version'  => array(
                'label' => 'Shortcode Version',
                'icon'  => 'dashicons-editor-code',
            ),
        ),
		'tab_style' => 'default',
        'fields' => array(
            array(
                'id'     => 'ab_downloadgroup',
                'type'   => 'group',
                'clone'  => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => '{ab_eptitle}',
				'save_state' => true,
				'tab'  => 'input-version',
                'fields' => array(
                    array(
                        'name'  => 'Episode Title',
                        'id'    => 'ab_eptitle',
                        'type'  => 'text',
                    ),
                    array(
                        'name'   => 'Resolution',
                        'id'     => 'ab_resolution',
                        'type'   => 'group',
                        'clone'  => true,
						'sort_clone'  => true,
						'collapsible' => true,
						'group_title' => '{ab_pixel}',
                        'fields' => array(
                            array(
                                'name'  => 'Pixel',
                                'id'    => 'ab_pixel',
                                'type'  => 'text',
                            ),
							array(
								'name'   => 'Download Link',
								'id'     => 'ab_downloadlink',
								'type'   => 'group',
								'clone'  => true,
								'sort_clone'  => true,
								'fields' => array(
									// Normal field (cloned)
									array(
										'name'  => 'Hosting Name',
										'id'    => 'ab_hostingname',
										'type'  => 'text',
									),
									array(
										'name'  => 'URL',
										'id'    => 'ab_linkurl',
										'type'  => 'text',
									),
								),
							),
                        ), //pixel
                    ),
                ), //episode
            ), //input-version
			array(
                'name'  => __( 'Link Download', 'meta-box' ),
                'id'    => "{$prefix}batch",
                'type'  => 'wysiwyg',
				'tab' => 'sc-version',
            ),
        ),
    );
	return $meta_boxes;
}