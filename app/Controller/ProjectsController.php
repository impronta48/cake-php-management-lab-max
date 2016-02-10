<?php
class ProjectsController extends AppController {
	public $scaffold;	
	
	public function index($chiusi = 0)
	{
		//Mi preparo un array di condizioni
		$conditions = array();
		if ($chiusi == 0 )
		{
			$conditions['closed != '] =1;
		}
		else
		{
			$conditions['closed'] =1;
		}
		
		//Faccio una query con queste condizioni
		//Estraggo l'elenco completo dei progetti
		$p = $this->Project->find('all', array('conditions'=> $conditions));
		$this->set('projects',$p);
		
		//Conto quanti task NON completi ci sono in ogni progetto
		//Nota: Faccio la query opposta alla logica per beccare anche i task che hanno complete=NULL
		//Task.complete != 1 invece di Task.complete = 0
		$conta = $this->Project->Task->find('all', 
				array(
					'fields' => array('Task.project_id', 'count(Task.id) as c'),
					'conditions' => array('Task.complete != '  => 1 ),
					'group' => 'project_id',
				) 
		);		
		
		//Purtroppo il risultato che produce la query non è comodo per la view, lo 
		//devo girare per ottenere un array del tipo $conta[progetto] = numero_task
		//Giro l'array per rendere più comodo il conteggio dei task aperti
		$conta2 = array();
		foreach ($conta as $c)
		{
			$conta2[ $c['Task']['project_id']]= $c[0]['c'];
		}
		
		$this->set('conta2', $conta2);
	}

	public function report()
	{
		$projects= $this->Project->find('all');
		$this->set('projects', $projects );

		$numtask = array();
		//Calcolo quanti task sono aperti, completi e scaduti
		foreach ($projects as $p)
		{
			//Inizializzo l'array numtask per questo progetto
			$numtask[ $p['Project']['id'] ]['completati'] = 0;
			$numtask[ $p['Project']['id'] ]['scaduti'] = 0;
			$numtask[ $p['Project']['id'] ]['aperti'] = 0;

			foreach ($p['Task'] as $t)
			{
				if ($t['complete'] == 1 )
				{
					$numtask[ $p['Project']['id'] ]['completati'] ++;
				}
				elseif ($t['deadline'] < date('Y-m-d')) //Scaduto 
				{
					$numtask[ $p['Project']['id'] ]['scaduti'] ++;
				}
				else
				{
					$numtask[ $p['Project']['id'] ]['aperti'] ++;
				}
			}
		}
		$this->set('numtask', $numtask);
	}
    
    public function edit($id)
    {
        if (!empty($this->request->data))
        {
            if ($this->Project->save($this->request->data) )
            {
                return $this->redirect('index');
            }
            else{
                $this->Sessions->setFlash('Errore durante il salvataggio');
            }
        }
        
        //Estraggo il progetto da db e lo metto in request->data
        $this->data = $this->Project->findById($id);
        
        //Estraggo la lista dei manager (non hanno manager)
        $managers= $this->Project->User->find('list', array('conditions' => array(
                        'manager_id' => NULL
                )
            ));
        
        //Preparo le condizioni per individuare le risorse di un manager
        //e faccio la query
        $conditions = array();
        $conditions['manager_id'] = $this->data['Project']['manager_id'];        
        $users = $this->Project->User->find('list', array('conditions'=> $conditions));
        
        //Passo i valori alla view
        $this->set('users',$users);
        $this->set('managers',$managers);
        
    }
}
