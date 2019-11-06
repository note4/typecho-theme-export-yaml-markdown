---
layout: 
title: "<?php $this->title() ?>" 
date: <?php $this->date('Y-m-d H:i'); ?> 
updated: 
tags: [<?php $this->tags(',',false,''); ?>] 
categories:  [<?php $this->category(',',false); ?>]
permalink: <?php $this->cid() ?> 
---

<?php $this->content(); ?>