import IntlMessage from "@/Components/Common/IntlMessage";
import Table from "@/Components/Common/Table";
import { Article, Comment, Person, Store } from "@mui/icons-material";
import { Divider, Grid, Stack, Typography } from "@mui/material";
import { format } from "date-fns";
import { Fragment } from "react";

export default ({ item, data }) => {

    return (
        <Fragment>
            <Stack spacing={2} padding={4}>
                <Stack
                    bgcolor="white.main"
                    borderRadius={2}
                    padding={2}
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
                        <IntlMessage id="transfer" /> Nº {item.id}
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
                                <Store sx={{ fontSize: "inherit", marginRight: 1 }} />
                                <IntlMessage id={"moduleSend"} />: { item.module_send_id ? item.module_send.name: '' }
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
                            <Person sx={{ fontSize: "inherit", marginRight: 1 }} />
                            <IntlMessage id={"user"} />: { item.user_id ? item.user.first_name +' '+ item.user.last_name : '' }
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
                            <Store sx={{ fontSize: "inherit", marginRight: 1 }} />
                            <IntlMessage id={"moduleReceive"} />: { item.module_receive_id ? item.module_receive.name : '' }
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
                            <IntlMessage id={"created_at"} />: { format(new Date(item.created_at), 'dd MMMM yyyy') }
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
                                {/*  vacio */}
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
                                <IntlMessage id={"updated_at"} />: { format(new Date(item.updated_at), 'dd MMMM yyyy') }
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
                                <IntlMessage id={"description"} />: { item.description }
                            </Typography>
                        </Stack>
                      </Grid>

                    </Grid>
                </Stack>


                {/* asyncronous table for view and filters for recipes of doctor */}
                <Table
                    routeParams={{ item: item.id }}
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
                            accessorKey: 'pivot.quantity',
                            header: 'quantity',
                        },
                    ]}
                />

            </Stack>
        </Fragment>
    );
};
