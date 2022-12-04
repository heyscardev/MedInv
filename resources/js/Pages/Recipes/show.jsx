import IntlMessage from "@/Components/Common/IntlMessage";
import Table from "@/Components/Common/Table";
import { Article, Bookmark, Comment, Person, Store } from "@mui/icons-material";
import { Divider, Grid, Stack, Typography } from "@mui/material";
import { format } from "date-fns";
import { Fragment } from "react";

export default ({ recipe, data }) => {
    return (
        <Fragment>
            <Stack spacing={2} padding={4}>
                <Stack
                    bgcolor="white.main"
                    borderRadius={2}
                    padding={1}
                    gap={2}
                >
                    <Typography
                        variant="h3"
                        align="center"
                        fontWeight="bolder"
                        color="primary"
                        display="flex"
                        alignItems="center"
                        alignSelf="center"
                    >
                        <Article sx={{ fontSize: "inherit", marginRight: 2 }} />
                        <IntlMessage id="Recipe" /> Nº {recipe.id}
                    </Typography>
                    <Typography
                        variant="h6"
                        align="center"
                        fontWeight="bolder"
                        color="primary"
                        display="flex"
                        alignItems="center"
                        alignSelf="center"
                    >
                        <Bookmark sx={{ fontSize: "inherit", marginRight: 1 }} />
                        {recipe.recipe_type}

                        <Bookmark sx={{ fontSize: "inherit", marginLeft: 4, marginRight: 1 }} />
                        {/* <IntlMessage id={"pathology"} />: */}
                        { recipe.pathology_id ? recipe.pathology.name : '' }
                    </Typography>
                    <Divider />
                    <Grid
                      container
                      alignItems="flex-end"
                      justifyContent="center"
                      rowGap={1}
                      columnSpacing={2}
                    >
                      <Grid item xs={12} sm={8}>
                        <Stack >
                            <Typography
                                variant="h5"
                                textAlign="left"
                                color="primary"
                            >
                                <Person sx={{ fontSize: "inherit", marginRight: 1 }} />
                                <IntlMessage id={"patient"} />: { recipe.patient_id ? recipe.patient.first_name +' '+recipe.patient.last_name : '' }
                            </Typography>
                        </Stack>
                      </Grid>
                      <Grid item xs={12} sm={4}>
                        <Stack>
                          <Typography
                            variant="span"
                            textAlign="right"
                            color="primary"
                          >
                            <IntlMessage id={"user"} />: { recipe.user_id ? recipe.user.first_name +' '+recipe.user.last_name : '' }
                          </Typography>
                        </Stack>
                      </Grid>
                      <Grid item xs={12} sm={8}>
                        <Stack>
                          <Typography
                            variant="h5"
                            textAlign="left"
                            color="primary"
                          >
                            <Person sx={{ fontSize: "inherit", marginRight: 1 }} />
                            <IntlMessage id={"doctor"} />: { recipe.doctor_id ? recipe.doctor.first_name +' '+recipe.doctor.last_name : '' }
                          </Typography>
                        </Stack>
                      </Grid>
                      <Grid item xs={12} sm={4}>
                        <Stack>
                          <Typography
                            variant="span"
                            textAlign="right"
                            color="secondary.dark"
                          >
                            <IntlMessage id={"created_at"} />: { format(new Date(recipe.created_at), 'dd MMMM yyyy') }
                          </Typography>
                        </Stack>
                      </Grid>

                      <Grid item xs={12} sm={8}>
                        <Stack >
                            <Typography
                                variant="h5"
                                textAlign="left"
                                color="primary"
                            >
                                <Store sx={{ fontSize: "inherit", marginRight: 1 }} />
                                <IntlMessage id={"module"} />: { recipe.module_id ? recipe.module.name : '' }
                            </Typography>
                        </Stack>
                      </Grid>

                      <Grid item xs={12} sm={4}>
                        <Stack >
                            <Typography
                                variant="span"
                                textAlign="right"
                                color="primary"
                            >
                                <IntlMessage id={"updated_at"} />: { format(new Date(recipe.updated_at), 'dd MMMM yyyy') }
                            </Typography>
                        </Stack>
                      </Grid>

                      <Grid item xs={12} sm={8}>
                        <Stack >
                            <Typography
                                variant="h6"
                                textAlign="left"
                                color="primary"
                            >

                            </Typography>
                        </Stack>
                      </Grid>

                      <Grid item xs={12} sm={4}>
                        <Stack >
                            <Typography
                                variant="p"
                                textAlign="right"
                                color="error"
                            >
                            {   recipe.deleted_at && <span>
                                                        <IntlMessage id={"deleted_at"} />:
                                                        { format(new Date(recipe.deleted_at), 'dd MMMM yyyy') }
                                                    </span>
                            }
                            </Typography>
                        </Stack>
                      </Grid>

                      <Grid item xs={12} sm={12}>
                        <Stack >
                            <Typography
                                variant="h6"
                                textAlign="left"
                                color="secondary.dark"
                            >
                                <Comment sx={{ fontSize: "inherit", marginRight: 1 }} />
                                <IntlMessage id={"description"} />: { recipe.description }
                            </Typography>
                        </Stack>
                      </Grid>

                    </Grid>
                </Stack>
            </Stack>

            {/* asyncronous table for view and filters for recipes of doctor */}
            <Table
                routeParams={{ recipe: recipe.id }}
                enableRowSelection={false}
                data={data}
                initialState={{ columnVisibility: { id: false } }}
                columns={[
                    { accessorKey: "id", header: "id" },
                    {
                        accessorKey: 'code',
                        header: 'code',
                    },
                    {
                        accessorKey: 'name',
                        header: 'medicament',
                    },
                    {
                        accessorKey: 'unit.name',
                        header: 'unit',
                    },
                    {
                        accessorKey: 'pivot.prescribed_amount',
                        header: 'prescribed_amount',
                    },
                    {
                        accessorKey: 'pivot.quantity',
                        header: 'quantity_deliver',
                    },
                ]}
            />
        </Fragment>
    );
};
