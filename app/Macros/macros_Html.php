<?php

/**
* **************************************************************
* HTML MACROS
* **************************************************************.
*/

Html::macro('switchResponsive', function ($lg, $sm) {
    $lg = substr($lg, 0, 75);
    $str = '<span class="visible-md visible-lg">' . $lg . '</span>' . '<span class="visible-xs visible-sm">' . strtoupper($sm) . '</span>';

    return $str;
});

Html::macro('tag_badge', function ($organisation, $tag) {
    switch ($tag->type) {
        case 'people':
        $icon = \Html::alias_fa('user');
        break;
        case 'purpose':
        $icon = \Html::alias_fa('bullseye');
        break;
        case 'datum':
        $icon = \Html::alias_fa('info');
        break;
        default:
        $icon = \Html::alias_fa('question-circle');
        break;
    }

    switch ($tag->category) {
        case 'data_object':
        $color = 'danger';
        break;
        case 'data_subject':
        $color = 'default';
        break;
        case 'purpose':
        $color = 'info';
        break;
        case 'identification':
            $color = 'warning';
            break;
            case 'location':
            $color = 'success';
            break;
            case 'policical':
            $color = 'info';
            break;
            case 'education':
            $color = 'secondary';
            break;
            default:
            $color = 'primary';
            break;
        }
        $url = route('organisation.tags.show',[$organisation->slug,$tag->id]);

        $str = '<li><a href="' . $url . '"><span class="badge badge-' . $color . '" alt="' . $tag->category . '">' . $icon . ' '. $tag->name . '</span><span class="text-muted small">' . $tag->category . '</a></span></li>';
        return $str;
    });



    Html::macro('randSlug', function ($length = 10) {
        return substr(str_shuffle(str_repeat($x='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)))), 1, $length);
    });

    Html::macro('badgeStatus', function ($var) {
        switch ($var->status) {
            case 'pass':
            $class = 'alert-success';
            break;
            case 'hidden':
            $class = 'alert-danger';
            break;
            case 'open':
            $class = 'alert-success';
            break;
            case 'close':
            $class = 'alert-warning';
            break;
            default:
            $class = 'alert-danger';
            break;
        }
        $return = '<span class="badge ' . $class . '">';
        $return .= \__('mesydel.status_' . $var->status);
        $return .= '</span>';

        return $return;
    });

    Html::macro('labelStatus', function ($var) {
        switch ($var->status) {
            case 'pass':
            $class = 'label-success';
            break;
            case 'open':
            $class = 'label-success';
            break;
            case 'hidden':
            $class = 'label-danger';
            break;
            case 'close':
            $class = 'label-warning';
            break;
            default:
            $class = 'label-danger';
            break;
        }
        $return = '<span class="label ' . $class . '">';
        $return .= \__('mesydel.status_' . $var->status);
        $return .= '</span>';

        return $return;
    });



    Html::macro('progress', function ($current, $total) {
        if (empty($total)) {
            return \__('mesydel.nothing_found');
        }

        $pctValue = number_format($current / $total * 100, 0);

        if ($pctValue > 100) {
            $pctValue = 100;
        }

        if ($pctValue > 70) {
            $class = 'progress-bar-success';
        } elseif ($pctValue < 40) {
            $class = 'progress-bar-warning';
        } else {
            $class = 'progress-bar-info';
        }
        $str = '';
        $str .= '<div class="progress">
        <div class="progress-bar ' . $class . '" role="progressbar" aria-valuenow="' . $pctValue . '" aria-valuemin="0" aria-valuemax="100" style="width: ' . $pctValue . '%; min-width: 2em;">
        ' . $pctValue . '%
        </div>
        </div>';

        return $str;
    });


    Html::macro('alias_fa', function ($alias, $span_class = null) {
        switch ($alias) {
            default:
            $output = '<i class="fa fa-' . $alias . ' fa-fw"></i>';
            break;
        }
        if (isset($span_class)) {
            return '<span class="' . $span_class . '">' . $output . '</span>';
        } else {
            return $output;
        }
    });
