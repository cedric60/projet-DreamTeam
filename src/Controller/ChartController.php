<?php

namespace App\Controller;

use Silex\Application;

class ChartController
{

    /**
     * 
     * @param Application $app
     * @return array
     */
    function DrawChartAction(Application $app)
    {
        $smileys = $app['dao.givenanswer']->findNumberSmiley();

        $col[] = ['id' => '', 'label' => 'name', 'pattern' => '', 'type' => 'string'];
        $col[] = ['id' => '', 'label' => 'number', 'pattern' => '', 'type' => 'number'];
        $cols  = ['cols' => $col];

        foreach ($smileys as $smiley) {
            $row[] = ['c' => [['v' => $smiley['name'],
              'f' => null], ['v' => (int) $smiley['count'], 'f' => null]]];
        }

        $rows = ['rows' => $row];

        $newdatajson = json_encode(array_merge($cols, $rows));

        return $newdatajson;
    }
    function DrawChartAction2($id = null, $start = null, $end = null, Application $app)
    {
        $smileys = $app['dao.givenanswer']->findNumberSmileyById($id, $start, $end);

        $col[] = ['id' => '', 'label' => 'name', 'pattern' => '', 'type' => 'string'];
        $col[] = ['id' => '', 'label' => 'number', 'pattern' => '', 'type' => 'number'];
        $cols  = ['cols' => $col];

        foreach ($smileys as $smiley) {
            $row[] = ['c' => [['v' => $smiley['name'],
              'f' => null], ['v' => (int) $smiley['count'], 'f' => null]]];
        }

        $rows = ['rows' => $row];

        $newdatajson = json_encode(array_merge($cols, $rows));

        return $newdatajson;
    }
    

    /**
     * 
     * @param Application $app
     * @return string
     */
    function columnChartAction(Application $app)
    {
        $res = $app['dao.givenanswer']->findNumberSmiley();

        $data = '[["name", "count"],';

        foreach ($res as $re) {

            $data .= '["' . $re['name'] . '" , ' . (int) $re['count'] . '],';
        }
        $data = substr($data, 0, -1) . ']';

        return $data;
    }


    function columnChartAction2($id = null, $start = null, $end = null, Application $app)
    {
        $res = $app['dao.givenanswer']->findNumberSmileyById($id, $start, $end);

        $data = '[["name", "count"],';

        foreach ($res as $re) {

            $data .= '["' . $re['name'] . '" , ' . (int) $re['count'] . '],';
        }
        $data = substr($data, 0, -1) . ']';

        return $data;
    }
    /**
     * 
     * @param Application $app
     * @return type
     */
    function chartAction(Application $app)
    {
        $formationList = $app['dao.formation']->findAll();
        $commentsList = $app['dao.givenanswer']->findComments();
        return $app['twig']->render('chart.twig', array('formationList' => $formationList,
                                                        'commentsList' => $commentsList));
       
    }

    function commentsAction($id = null, $start = null, $end = null, Application $app)
    {
        $res = $app['dao.givenanswer']->findCommentsById($id, $start, $end);
            $data = "";
            foreach ($res as $re) {
                $date = \DateTime::createFromFormat('Y-m-d', $re["date"])->format('d/m/Y');
                $data .= '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID Formation</th>
                                    <th>Formation</th>
                                    <th>Réponse données</th>
                                    <th>Pourquoi</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID Formation</th>
                                    <th>Formation</th>
                                    <th>Réponse données</th>
                                    <th>Pourquoi</th>
                                    <th>Date</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                    <tr>
                                        <td>' . $re["idformation"] . '</td>
                                        <td>' . $re["formationname"] . '</td>
                                        <td>' . $re["name"] .'</td>
                                        <td>' . $re["why"] . '</td>
                                        <td>' . $date . '</td>
                                    </tr>  
                            </tbody>
                        </table>';
            }
    
            return $data;
       
    }


}
