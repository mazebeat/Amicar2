<?php

User::observe(new UserObserver($app->make('validator')));