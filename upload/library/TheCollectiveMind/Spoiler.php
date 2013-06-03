<?php

class TheCollectiveMind_Spoiler
{

    /**
     * Creates the custom user field preference to auto hide spoilers
     * 
     * @param boolean $existingAddon Only run if not installed
     * 
     * @return null
     */
    public static final function setUp($existingAddon)
    {
        if (!$existingAddon) {
            $dw = XenForo_DataWriter::create('XenForo_DataWriter_UserField');
            $dw->set('field_id', 'autoExpandSpoilers');
            $dw->set('display_group', 'preferences');
            $dw->set('display_order', 1);
            $dw->set('field_type', 'checkbox');
            $dw->set('required', 0);
            $dw->set('show_registration', 1);
            $dw->set('user_editable', 'yes');  
            $dw->set('viewable_profile', 0);
            $dw->set('viewable_message', 0);
            $dw->set('display_template', '');

            $choices = array(
                'true' => 'Expand Spoilers'
            );

            $dw->setFieldChoices($choices);

            $dw->save();
        }
    }

    /**
     * Remove custom user field preference to auto hide spoilers
     * 
     * @param boolean $existingAddon Only run if installed
     * 
     * @return null
     */
    public static final function tearDown($existingAddon)
    {
        if ($existingAddon) {
            $dw = new XenForo_DataWriter_UserField();
            $dw->setExistingData('autoExpandSpoilers');
            $dw->delete();
        }
    }
}