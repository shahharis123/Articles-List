<?php
$config = array(
          'add_article_rules' => array(
                             array(
                                 'field'=>'title',
                                 'label'=>'Article Title',
                                 'rules'=>'required|alpha_numeric_spaces'
                             ),
                             array(
                                'field'=>'body',
                                 'label'=>'Article Body',
                                 'rules'=>'required' 
                             )

                    )
        );